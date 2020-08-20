<?php
class Blockchain
{
    private PDO $db;
    public array $table;
    public string $tableName;
    public function __construct(PDO $db, string $tableName)
    {
        //FETCH DATA
        $statement = $db->prepare("SELECT * FROM $tableName");
        $statement->execute();
        $this->table = $statement->fetchAll(PDO::FETCH_ASSOC);
        $this->db = $db;
        $this->tableName = $tableName;

        date_default_timezone_set('UTC');
    }
    public function AddBlock(string $value)
    {
        //ADD NEW BLOCK
        $valueHashed = BlockChain::sha256($value);
        $timeStamp = date("Y-m-d H:i:s");
        $query = "INSERT INTO $this->tableName (`Value`,`TimeStamp`, `Hash`, `ValueHashed`) VALUES
        ('$value',
        '$timeStamp','" . 
        $this->ComputeHash($valueHashed, $timeStamp) . "', 
        '$valueHashed')";

        $stmt = $this->db->prepare($query);
        if (!$stmt)
            die("Error preparing db");
        if (!$stmt->execute())
            die("Error quering db");
    }
    private function ComputeHash(string $valueHashed, string $timeStamp)
    {
        //FETCH LAST BLOCK
        $query = "SELECT Hash FROM $this->tableName ORDER BY TimeStamp DESC LIMIT 1";
        $stmt = $this->db->prepare($query);
        if (!$stmt)
            die("Error preparing db");
        if (!$stmt->execute())
            die("Error quering db");
        $row = $stmt->fetch(PDO::FETCH_UNIQUE);
        if (!$row)
            die("Eroor fetching last row");
        //HASH
        return BlockChain::sha256($valueHashed . $timeStamp . $row["Hash"]);
    }
    private static function sha256($value)
    {
        return hash("sha256", $value);
    }
}
