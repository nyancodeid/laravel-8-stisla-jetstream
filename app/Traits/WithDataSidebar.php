<?php

namespace App\Traits;


trait WithDataSidebar {
    
    public function sidebar_data ()
    {
        $links = [
            [
                "href" => "dashboard",
                "text" => "Dashboard",
                "is_multi" => false,
            ],
            [
                "href" => [
                    [
                        "icon" => "fas fa-chart-bar",
                        "section_text" => "User",
                        "section_list" => [
                            ["href" => "user", "text" => "Data User"],
                            ["href" => "user.new", "text" => "Buat User"]
                        ]
                    ],
                    [
                        "icon" => "fas fa-book",
                        "section_text" => "Test No Dropdown",
                        "href" => "no.dropdown",
                        "section_list" => []
                    ]
                ],
             
                "text" => "Applikasi",
                "is_multi" => true,
                
            ],
        ];
        $navigation_links = array_to_object($links);

        return $navigation_links;
    }
}