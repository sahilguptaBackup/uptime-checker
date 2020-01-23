<?php

namespace App\Components;

use Google\Cloud\Firestore\FirestoreClient;

class FirebaseDB
{
    private $db = [];

    public function __construct()
    {
        $this->db = new FirestoreClient(
            [
                'projectId' => env('FIRESTORE_PROJECT_ID', ''),
                'apiKey' => env('FIRESTORE_WEB_API_KEY', '')
            ]
        );
    }

    public function fs($collection, $data)
    {
        $db_connection = $this->db->collection($collection)->document(sha1(rand() . time()));
        $db_connection->set($data);
        return;
    }

    public function fr($data)
    {
        $konnection = $this->db->collection($data['collection']);
        $docs = $konnection->limit($data['limit'])->documents();
        $format_data = [];
        // dd($docs);
        foreach ($docs as $doc) {
            if ($doc->exists()) {
                $format_data[] = $doc->data();
            }
        }
        return $format_data;
    }
}
