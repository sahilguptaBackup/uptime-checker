<?php

class UptimeChecker {
    public function startTest($url) {
        $command_output =  $this->executeCmd($url);
        return $this->hasSuccessStatus($command_output);
    }

    private function hasSuccessStatus($command_output) {
        foreach ($command_output as $output) {
            if (strpos($output, 'HTTP') !== false && strpos($output, '200')) {
                return true;
            }
        }
        return false;
    }

    private function executeCmd($url) {
        exec("curl -sSL -D - $url -o /dev/null", $output);
        dd($output);
        return $output;   
    }
}