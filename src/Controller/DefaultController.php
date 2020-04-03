<?php


namespace App\Controller;


use App\WebsocketClient;
use Ratchet\RFC6455\Handshake\RequestVerifier;
use Ratchet\RFC6455\Handshake\ServerNegotiator;
use Ratchet\RFC6455\Messaging\Frame;
use Ratchet\RFC6455\Messaging\Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function indexAction(): Response
    {
        $frame = new Frame('testfromphp');
        $frame->maskPayload();
        $message = new Message();
        $message->addFrame($frame);
        dump((string)$message);
        //exit;

        $WebSocketClient = new WebsocketClient('localhost', 8080, '5624c7d1f10b1');
        //echo $WebSocketClient->sendData($message->getPayload());
        //echo $WebSocketClient->sendData((string) $message);
        //echo $WebSocketClient->sendData($message->getPayload());
        echo $WebSocketClient->sendData('хуй пизда джигурда');
        unset($WebSocketClient);

        //$client = HttpClient::create();
        //$response = $client->request('GET', 'http://localhost:8080');
        //
        //
        //dump($response->getStatusCode(), $response->getContent());
        exit;
        //return new Response('sec');
    }
}
