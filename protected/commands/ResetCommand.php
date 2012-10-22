<?php
class ResetCommand extends CConsoleCommand
{
    public function run()
    {
        $commandPath = Yii::app()->getBasePath() . DIRECTORY_SEPARATOR . 'commands';
        $runner = new CConsoleCommandRunner();
        $runner->addCommands($commandPath);
        $commandPath = Yii::getFrameworkPath() . DIRECTORY_SEPARATOR . 'cli' . DIRECTORY_SEPARATOR . 'commands';
        $runner->addCommands($commandPath);
        $args = array('yiic', 'migrate', 'redo', '--interactive=0');
        ob_start();
        $runner->run($args);
        echo htmlentities(ob_get_clean(), null, Yii::app()->charset);
    }
}