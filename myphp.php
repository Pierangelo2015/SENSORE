<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Recupera il comando inviato dal bottone
    $comando = isset($_POST['comando']) ? trim($_POST['comando']) : 'nessuno';
    
    // Nome del file fisso richiesto
    $nome_file = "pcdata.csv";
    $percorso_completo = $_SERVER['DOCUMENT_ROOT'] . '/' . $nome_file;
    
    // Genera la riga CSV: timestamp corrente e stringa del comando
    $data_ora = date("Y-m-d H:i:s");
    $data_ = date("Y-m-d");
    $ora_ = date("H:i:s");
    $riga_csv = $comando . ",,,\n";
    
    // Scrive (o sovrascrive) il file command.csv
    if (file_put_contents($percorso_completo, $riga_csv) !== false) {
        echo "<h1>Comando Registrato</h1>";
        echo "<p>Scritto in <strong>$nome_file</strong>: <code>" . htmlspecialchars(trim($riga_csv)) . "</code></p>";
        echo "<br><a href='index.html'>INDIETRO</a>";
    } else {
        echo "<h1>Errore Host</h1><p>Impossibile scrivere il file di comando.</p>";
    }
} else {
    header("Location: index.html");
    exit;
}
?>