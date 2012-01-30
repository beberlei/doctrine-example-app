<?php

namespace CarFramework;

use Doctrine\DBAL\Logging\SQLLogger;
use Symfony\Component\Console\Output\OutputInterface;

class ConsoleSQLLogger implements SQLLogger
{
    /**
     * @var array
     */
    private $queries = array();

    public function startQuery($sql, array $params = null, array $types = null)
    {
        $this->queries[] = array('sql' => $sql, 'params' => $params, 'types' => $types, 'start' => microtime(true));
    }

    public function stopQuery()
    {
        $this->queries[count($this->queries)-1]['diff'] =
            number_format(microtime(true) - $this->queries[count($this->queries)-1]['start'], 6);
    }

    public function flush(OutputInterface $output)
    {
        $output->writeln('');
        $output->writeln('');
        foreach ($this->queries as $query) {
            $output->writeln(sprintf("Query: <comment>%s</comment>\n    Took <info>%s</info> seconds.", $query['sql'], $query['diff']));
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
        }
    }
}

