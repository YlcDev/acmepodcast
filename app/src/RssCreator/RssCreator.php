<?php

namespace App\RssCreator;

use App\Repository\PodcastRepository;
use FeedIo\Adapter\Guzzle\Client as ClientAdapter;
use FeedIo\Feed;
use FeedIo\Feed\Item\Media;
use FeedIo\FeedIo;
use GuzzleHttp\Client;
use Psr\Log\NullLogger;

class RssCreator
{
    private $podcast;

    public function __construct(PodcastRepository $podcastRepository)
    {
        $this->podcast = $podcastRepository->find(1);
    }

    public function produce(string $fileExtension)
    {
        $feed = $this->produceFeed();

        $feed = $this->addItems($feed);

        $guzzle = new Client();

        $client = new ClientAdapter($guzzle);

        $logger = new NullLogger();

        return (new FeedIo($client, $logger))->format($feed, $fileExtension);
    }

    private function produceFeed()
    {
        $feed = new Feed();

        $feed->setTitle($this->podcast->getTitle())
            ->setDescription($this->podcast->getDescription())
            ->setLink($this->podcast->getLink());

        return $feed;
    }

    public function addItems(Feed $feed)
    {
        $episodes = $this->podcast->getEpisodes();

        foreach ($episodes as $episode) {
            $item = $feed->newItem();

            $media = new Media();
            $media->setUrl($episode->getMediaFileUrl());

            $item->addMedia($media);
            $item->setTitle($episode->getTitle())
                ->setDescription($episode->getDescription())
            ;

            $feed->add($item);
        }

        return $feed;
    }


}