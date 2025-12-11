<?php




$csvFile = __DIR__ . '/e2fi2.csv';
$outFile = __DIR__ . '/klassenliste.xml';

$dom = new DOMDocument('1.0', 'utf-8');
$dom->formatOutput = true;

$root = $dom->createElement('klassenliste');
$dom->appendChild($root);

if (!file_exists($csvFile)) {
	fwrite(STDERR, "CSV file not found: $csvFile\n");
	exit(1);
}
/**
 * Opens and reads a CSV file line by line
 * 
 * The CSV file uses semicolon (;) as delimiter
 * Each iteration processes one line of data from the file
 * 
 * Line counter starts at 0 and increments with each row read
 * 
 * SKIP HEADER LOGIC:
 * A CSV file typically has a header row at the top (line 0) that contains 
 * column names instead of actual data (e.g., "Name;Email;Age")
 * We skip this header because we only want to process actual data rows
 * 
 * FIRST IF STATEMENT:
 * if ($line === 0) checks if we're at line 0 (the first line/header)
 * If true, it increments the line counter and uses continue to skip
 * to the next iteration, effectively ignoring the header row
 * 
 * SECOND IF STATEMENT:
 * if (count($data) < 3) validates that each row has at least 3 columns
 * This prevents errors if a data row is incomplete or malformed
 * If the row has fewer than 3 columns, skip it with continue
 * This ensures only valid, complete data rows are processed
 */

if (($handle = fopen($csvFile, 'r')) !== false) {
	$line = 0;

    /**
     * Reads a line from the CSV file and parses it into an array.
     * 
     * The while loop continues to read each line of the CSV file until 
     * there are no more lines to read. The fgetcsv function is used to 
     * parse the line into an array, using the specified delimiter.
     * 
     * @param resource $handle The file handle of the opened CSV file.
     * @param int $length The maximum line length to read. In this case, 
     *                    it is set to 1000 characters. If a line exceeds 
     *                    this length, it will be truncated.
     * @param string $delimiter The character used to separate values in 
     *                          the CSV file. Here, it is set to a semicolon (';').
     * 
     * The loop will continue until fgetcsv returns false, indicating 
     * that there are no more lines to read from the file.
     */
	while (($data = fgetcsv($handle, 1000, ';')) !== false) {

		// skip header
		if ($line === 0) { $line++; continue; }
		if (count($data) < 3) { $line++; continue; }

		$nr = trim($data[0]);
		$vorname = trim($data[1]);
		$nachname = trim($data[2]);

		$schueler = $dom->createElement('schueler');
		$schueler->setAttribute('nr', $nr);

		$elVor = $dom->createElement('vorname');
		$elVor->appendChild($dom->createTextNode($vorname));
		$schueler->appendChild($elVor);

		$elNach = $dom->createElement('nachname');
		$elNach->appendChild($dom->createTextNode($nachname));
		$schueler->appendChild($elNach);

		$root->appendChild($schueler);
		$line++;
	}
	fclose($handle);
}

$dom->save($outFile);
echo "Wrote $outFile\n";

?>