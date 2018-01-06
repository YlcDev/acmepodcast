<?php

namespace App\RssCreator;

use App\Repository\EpisodeRepository;
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
    private $episodes;

    public function __construct(PodcastRepository $podcastRepository, EpisodeRepository $episodeRepository)
    {
        $this->podcast = $podcastRepository->find(1);
        $this->episodes = $episodeRepository->getAll();
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
        $episodes = $this->episodes;

        foreach ($episodes as $episode) {
            $item = $feed->newItem();

            $media = new Media();
            $media->setUrl($episode['mediaFileUrl']);

            $item->addMedia($media);
            $item->setTitle($episode['title'])
                ->setDescription($episode['description'])
            ;

            $feed->add($item);
        }

        return $feed;
    }


}