<?php

class FacilityModel extends Model
{
    // Mengambil data fasilitas terbaru (default limit 3 untuk home)
    public function fetchFacilities()
    {
        $sql = "SELECT * FROM fasilitas ORDER BY id_fasilitas DESC LIMIT 3";
        $result = pg_query($this->db, $sql);

        $data = [];
        if ($result) {
            while ($row = pg_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }
}