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

if (($handle = fopen($csvFile, 'r')) !== false) {
	$line = 0;
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