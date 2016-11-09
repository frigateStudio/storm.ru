<?php

class Albums
{

    public static function getAlbumsList()
    {
        $albumsList = array();
        $db = Db::getConnection();
        $result = $db->query("SELECT id, name, coverUrl  FROM albums");
        $i = 0;
        while ($row = $result->fetch()) {
            $albumsList[$i]['id'] = $row['id'];
            $albumsList[$i]['name'] = $row['name'];
            $albumsList[$i]['coverUrl'] = $row['coverUrl'];
            $i++;
        }
        return $albumsList;
    }
}

?>