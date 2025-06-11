<?php
header("Content-Type: application/json");
include "config.php";
$file = "cv.json";

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
$cv = readData();

switch ($method) {
    case "GET":
        usort($cv, fn($a, $b) => $b['id'] <=> $a['id']); // Tri décroissant
        echo json_encode($cv);
        break;

    case "POST":
    case "DELETE":
    case "PUT":
        if (!isAdmin()) {
            http_response_code(403);
            echo json_encode(["error" => "Accès interdit"]);
            exit;
        }

        if ($method === "POST") {
            $newExperience = [
                "id" => count($cv) + 1,
                "entreprise" => $data["entreprise"],
                "poste" => $data["poste"],
                "periode" => $data["periode"],
                "description" => $data["description"]
            ];
            $cv[] = $newExperience;
            writeData($cv);
            echo json_encode(["status" => "success"]);
        } else if ($method === "DELETE") {
            $id = $data["id"];
            $cv = array_values(array_filter($cv, fn($exp) => $exp["id"] != $id));
            writeData($cv);
            echo json_encode(["status" => "deleted"]);
        } else if ($method === "PUT") {
            $id = $data["id"];
            foreach ($cv as &$exp) {
                if ($exp["id"] == $id) {
                    $exp["entreprise"] = $data["entreprise"] ?? $exp["entreprise"];
                    $exp["poste"] = $data["poste"] ?? $exp["poste"];
                    $exp["periode"] = $data["periode"] ?? $exp["periode"];
                    $exp["description"] = $data["description"] ?? $exp["description"];
                }
            }
            writeData($cv);
            echo json_encode(["status" => "updated"]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Méthode non autorisée"]);
}

?>
