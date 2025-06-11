<?php
include 'config.php';
header("Content-Type: application/json");
$file = "descriptions.json";

// Lire les données JSON
function readData() {
    global $file;
    return file_exists($file) ? json_decode(file_get_contents($file), true) : [];
}

// Écrire dans le fichier JSON
function writeData($data) {
    global $file;
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
}

// Gestion des requêtes API
$method = $_SERVER["REQUEST_METHOD"];
$data = json_decode(file_get_contents("php://input"), true);
$descriptions = readData();

switch ($method) {
    case "GET":
        usort($descriptions, fn($a, $b) => $b['id'] <=> $a['id']); // Tri décroissant
        echo json_encode($descriptions);
        break;

    case "POST":
        if (!isAdmin()) {
            echo json_encode(["error" => "Non autorisé"]);
            exit;
        }
        $newDescription = [
            "id" => count($descriptions) + 1,
            "entreprise" => $data["entreprise"],
            "contenu" => $data["contenu"]
        ];
        $descriptions[] = $newDescription;
        writeData($descriptions);
        echo json_encode(["status" => "success"]);
        break;

    case "PUT":
        if (!isAdmin()) {
            echo json_encode(["error" => "Non autorisé"]);
            exit;
        }
        foreach ($descriptions as &$desc) {
            if ($desc["id"] == $data["id"]) {
                $desc["contenu"] = $data["contenu"];
            }
        }
        writeData($descriptions);
        echo json_encode(["status" => "updated"]);
        break;

    case "DELETE":
        if (!isAdmin()) {
            echo json_encode(["error" => "Non autorisé"]);
            exit;
        }
        $id = $data["id"];
        $descriptions = array_values(array_filter($descriptions, fn($desc) => $desc["id"] != $id));
        writeData($descriptions);
        echo json_encode(["status" => "deleted"]);
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Méthode non autorisée"]);
}
?>
