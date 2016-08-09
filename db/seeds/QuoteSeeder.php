<?php

use Phinx\Seed\AbstractSeed;

class QuoteSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = array(
            array(
                'author'    => 'It is never too late to be what you might have been.',
                'quote'    => 'GEORGE ELIOT',
                'added' => date('Y-m-d H:i:s'),
            ),
            array(
                'author'    => 'All our dreams can come true, if we have the courage to pursue them.',
                'quote'    => 'WALT DISNEY',
                'added' => date('Y-m-d H:i:s'),
            )
        );

        $posts = $this->table('quote');
        $posts->insert($data)
            ->save();
    }
}
