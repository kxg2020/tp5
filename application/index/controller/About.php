<?php

namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Exception;
use think\Loader;
use Monolog\Logger;
use Monolog\Handler\StdoutHandler;


class About extends Controller{


    public function indexAction(){


        $articles = Db::table('xm_article')->paginate(1);;


        $this->assign(['articles'=>$articles]);

        return view('about/index');
    }

    public function example1Action(){

        /**
         * 消费者
         */
        Loader::import('kafuka.vendor.autoload',EXTEND_PATH);

        date_default_timezone_set('PRC');

        $logger = new Logger('my_logger');

        $logger->pushHandler(new StdoutHandler());

        $config = \Kafka\ConsumerConfig::getInstance();

        $config->setMetadataRefreshIntervalMs(10000);
        $config->setMetadataBrokerList('127.0.0.1:2181');
        $config->setGroupId('zhang');
        $config->setBrokerVersion('0.8.2.2');
        $config->setTopics(array('zhangtao'));
        //$config->setOffsetReset('earliest');
        $consumer = new \Kafka\Consumer();
        $consumer->setLogger($logger);
        $consumer->start(function($topic, $part, $message) {
            var_dump($message);
        });
    }

    public function example2Action(){

        Loader::import('kafuka.vendor.autoload',EXTEND_PATH);

        date_default_timezone_set('PRC');

        $message = request()->post('content','','string');

        $logger = new Logger('my_logger');

        $logger->pushHandler(new StdoutHandler());

        $config = \Kafka\ProducerConfig::getInstance();

        $config->setMetadataRefreshIntervalMs(10000);

        $config->setMetadataBrokerList('127.0.0.1:9092');

        $config->setBrokerVersion('0.10.2.1');

        $config->setRequiredAck(1);

        $config->setIsAsyn(false);

        $config->setProduceInterval(500);

        $producer = new \Kafka\Producer(function() use($message) {
            return array(
                array(
                    'topic' => 'example',
                    'value' => $message,
                    'key' => 'example',
                ),
            );
        });
        $producer->success(function($result) {
            var_dump($result);
        });
        $producer->error(function($errorCode, $context) {
            var_dump($errorCode);
        });

         $producer->send();

    }



    public function insertAction(){

        return view('about/insert');
    }

}

