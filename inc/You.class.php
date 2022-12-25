<?php

use HeadlessChromium\BrowserFactory;
use HeadlessChromium\Page;


class You
{
    private $browser;

    public function __construct()
    {
        $browserFactory = new BrowserFactory();
        $this->browser = $browserFactory->createBrowser([
            'headless' => false, // disable headless mode
            'keepAlive' => true,
            'noSandbox' => true,
        ]);
    }

    public function askQuestion(string $question, string $pastAnswer)
    {
        $history = $pastAnswer ? [["question" => "", "answer" => $pastAnswer,]] : [];
        $query = sprintf("https://you.com/api/youchatStreaming?question=%s&chat=%s", urlencode($question), json_encode($history));

        // creates a new page and navigate to an URL
        $page =  $this->browser->createPage();
        $page->navigate($query)->waitForNavigation(Page::NETWORK_IDLE);
      

        // get data
        $body = $page->evaluate('document.querySelector("body").innerHTML')->getReturnValue();
        return $body;
    }

    public function process_data($data){
        $my_data = explode("\nevent: token\ndata: ",$data);
        $process_data = [];    
        foreach ($my_data as $value) {
            if(json_decode($value)){
                $process_data[] = json_decode($value);
            }
        }
        return $process_data;
    }

    public function __destruct()
    {
        $this->browser->close();
    }
}
