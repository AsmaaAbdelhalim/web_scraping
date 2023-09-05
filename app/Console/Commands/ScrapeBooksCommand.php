<?php

namespace App\Console\Commands;

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

use Illuminate\Console\Command;

class ScrapeBooksCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //protected $signature = 'app:scrape-books-command';
    protected $signature = 'scrape:books';

    

    /**
     * The console command description.
     *
     * @var string
     */
    //protected $description = 'Command description';
    protected $description = 'Scrape books from a website';
    /**
     * Execute the console command.
     */
    public function handle()
    {
         try {
            // Instantiate a new Goutte client
            $client = new Client();

            // Specify the URL of the website to scrape
            $url = 'https://www.kotobati.com/section/%D8%B1%D9%88%D8%A7%D9%8A%D8%A7%D8%AA';

            // Send a GET request to the website
            $crawler = $client->request('GET', $url);

            // Initialize an empty array to store the extracted data
            $books = [];

            // Extract the necessary data using XPath or CSS selectors
            $crawler->filter('.book-item')->each(function (Crawler $node) use (&$books) {
                $title = $node->filter('.book-title')->text();
                $author = $node->filter('.book-author')->text();
                $pagesCount = $node->filter('.book-pages')->text();
                $language = $node->filter('.book-lang')->text();
                $size = $node->filter('.book-size')->text();
                $pdfUrl = $node->filter('.book-pdf')->attr('href');

                $books[] = [
                    'title' => $title,
                    'author' => $author,
                    'pagesCount' => $pagesCount,
                    'language' => $language,
                    'size' => $size,
                    'pdfUrl' => $pdfUrl,
                ];
            });

            // Output the extracted data
            $this->info(print_r($books, true));

        } catch (\Exception $e) {
            // Handle any exceptions
            $this->error('Exception: ' . $e->getMessage());
        }
    }
}