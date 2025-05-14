<?php

class AboutController
{
    public function index()
    {
        view('about.view.php', [
            'heading' => 'About Us',
            'title' => 'About Zetrix - Business Agency',
            'description' => 'Learn more about our business agency and our mission'
        ]);
    }
} 