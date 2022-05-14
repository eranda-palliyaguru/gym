<?php
$conn = mysqli_connect("localhost", "colorb69_1", "rathunona1.", "colorb69_nedep");

class CsvFile {

    protected $file;

    public function __construct($file) {
        $this->file = fopen($file, 'r');
    }

    public function parse() {
        while (!feof($this->file)) {
            yield fgetcsv($this->file);
        }
        return;
    }
}

$csv = new CsvFile('lib/item.csv');
foreach ($csv->parse() as $column) {
   // echo $row[1];



            $sqlInsert = "INSERT into csv (code,price,qty)
                   values ('" . $column[1] . "','". $column[2] . "','" . $column[10] . "')";
            $result = mysqli_query($conn, $sqlInsert);
            
            
        



}
?>
<!DOCTYPE html>
<html>

<head>



</head>

<body>
    <h2>Import CSV file into Mysql using PHP</h2>
    
    
</body>

</html>