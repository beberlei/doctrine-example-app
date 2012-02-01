<?php

namespace CarFramework;

use Doctrine\DBAL\Logging\SQLLogger;
use Symfony\Component\Console\Output\OutputInterface;

class ConsoleSQLLogger implements SQLLogger
{
    private $output;
    /**
     * @var array
     */
    private $query;
    /**
     * @var int
     */
    private $counter = 0;

    private $start;

    private $sqlTime;

    public function __construct($output)
    {
        $this->output = $output;
        $this->start = microtime(true);
    }

    public function startQuery($sql, array $params = null, array $types = null)
    {
        $this->query = array('sql' => $sql, 'params' => $params, 'types' => $types, 'start' => microtime(true));
        $this->counter++;
    }

    public function stopQuery()
    {
        $query = $this->query;
        $output = $this->output;
        $diff = number_format(microtime(true) - $query['start'], 6);
        $this->sqlTime += $diff;

        $output->writeln(sprintf("Query: <comment>%s</comment>\n    Took <info>%s</info> seconds.", $query['sql'], $diff));
        foreach ($query['params'] as $idx => $param) {
            $type = (isset($query['types'][$idx])) ?$query['types'][$idx] : "unknown";
            if (is_object($param) && ! method_exists($param, '__toString')) {
                if ($param instanceof \DateTime) {
                    $param = "<DateTime:".$param->format('Y-m-d H:i:s') . ">";
                } else {
                    $param = "<Object:".get_class($param).">";
                }
            }
            $output->writeln(sprintf('    * %s: %s', $type, substr(str_replace(array("\r", "\n"), " ", $param), 0, 100)));
        }
        $output->writeln('');
    }

    public function finalize()
    {
        $total = number_format(microtime(true) - $this->start, 6);
        $percent = number_format($this->sqlTime / $total * 100, 2);
        $this->output->writeln(sprintf('A total of <error>%s</error> queries was executed.', $this->counter));
        $this->output->writeln(sprintf('The whole script took <comment>%s</comment> seconds, <comment>%s</comment> (<comment>%s Percent</comment>) of it were pure SQL processing time.', $total, $this->sqlTime, $percent));
    }
}

