<?php
    //Hanya Mengambil data h-index atau nama saja
    $apiKey = "d3a7416a53291eb0bb1a85770755681a";
    $authorId = "57931825700"; // Ganti dengan Scopus Author ID
    // $url = "https://api.elsevier.com/content/author/author_id/57931825700?view=metrics";
    // $url2 = "https://api.elsevier.com/content/author?author_id=$authorId";
    
    // $options = [
    //     "http" => [
    //         "header" => "X-ELS-APIKey: $apiKey\r\nAccept: application/json\r\n",
    //         "method" => "GET",
    //     ],
    // ];
    
    // $context = stream_context_create($options);
    // $response = file_get_contents($url, false, $context);
    // $data = json_decode($response, true);
    // $context2 = stream_context_create($options);
    // $response = file_get_contents($url2, false, $context2);
    // $data2 = json_decode($response, true);

    // var_dump($data2);
    // echo "Nama Penulis: " . $data['author-retrieval-response'][0]['author-profile']['preferred-name']['surname'] . "\n";
    echo "H-Index: " . $data['author-retrieval-response'][0]['h-index'];

    
    $url = "https://api.elsevier.com/content/search/scopus?query=AU-ID($authorId)&apiKey=$apiKey";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "X-ELS-APIKey: $apiKey",
        "Accept: application/json"
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);

    // EXAMPLE JSON
    // ["prism:url"]=> string(63) "https://api.elsevier.com/content/abstract/scopus_id/85204998802" 
    // ["dc:identifier"]=> string(21) "SCOPUS_ID:85204998802" 
    // ["eid"]=> string(18) "2-s2.0-85204998802" 
    // ["dc:title"]=> string(151) "Ash characteristics investigation from co-firing of Calliandra calothyrsus and Gliricidia sepium with a high-sulfur and -iron coal in drop tube furnace" 
    // ["dc:creator"]=> string(10) "Putra H.P." 
    // ["prism:publicationName"]=> string(22) "Bioresource Technology" 
    // ["prism:issn"]=> string(8) "09608524" 
    // ["prism:eIssn"]=> string(8) "18732976" 
    // ["prism:volume"]=> string(3) "413" 
    // ["prism:pageRange"]=> NULL 
    // ["prism:coverDate"]=> string(10) "2024-12-01" 
    // ["prism:coverDisplayDate"]=> string(13) "December 2024" 
    // ["prism:doi"]=> string(30) "10.1016/j.biortech.2024.131537" 
    // ["pii"]=> string(17) "S0960852424012410" 
    // ["citedby-count"]=> string(1) "2" 

    $scopusdoc = [];

    foreach ($data['search-results']['entry'] as $entry) {
        $thterbit = $entry["prism:coverDisplayDate"];
        $publisher = $entry['prism:publicationName'];
        $title = $entry['dc:title'];
        $link = $entry['link'][0]['@href'];  // Link dokumen
        $doi = $entry['prism:doi'];
        $scopusdoc[] = [
            'title' => $title,
            'link' => $link,
            'doi'=> $doi,
            'publisher' => $publisher,
            'thterbit' => $thterbit
        ];
    }
    
    // var_dump($data);
    // Tampilkan hasil
    // foreach ($scopusdoc as $doc) {
        
    //     echo "Publisher: " . $doc['publisher'] . "<br>";
    //     echo "Judul: " . $doc['title'] . "<br>";
        
    //     echo "Link: <a href='https://doi.org/" . $doc['doi'] . "' target='_blank'>" . $doc['doi'] . "</a><br><br>";

    
    // }


    ?>