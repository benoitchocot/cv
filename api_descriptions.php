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
    case "DELETE":
    case "PUT":
        if (!isAdmin()) {
            http_response_code(403); // Utiliser le code HTTP correct pour l'accès interdit
            echo json_encode(["error" => "Accès interdit"]);
            exit;
        }

        if ($method === "POST") {
            $entreprise = isset($data["entreprise"]) ? trim(htmlspecialchars($data["entreprise"], ENT_QUOTES | ENT_HTML5)) : '';
            $contenu = isset($data["contenu"]) ? trim(htmlspecialchars($data["contenu"], ENT_QUOTES | ENT_HTML5)) : '';

            if (empty($entreprise) || empty($contenu)) {
                http_response_code(400);
                echo json_encode(["error" => "L'entreprise et le contenu de la description sont requis."]);
                exit;
            }

            $newDescription = [
                "id" => count($descriptions) > 0 ? max(array_column($descriptions, 'id')) + 1 : 1,
                "entreprise" => $entreprise,
                "contenu" => $contenu
            ];
            $descriptions[] = $newDescription;
            writeData($descriptions);
            echo json_encode(["status" => "success", "new_item" => $newDescription]);

        } else if ($method === "PUT") {
            $id = isset($data["id"]) ? filter_var($data["id"], FILTER_VALIDATE_INT) : false;
            if ($id === false) {
                http_response_code(400);
                echo json_encode(["error" => "ID invalide pour la mise à jour."]);
                exit;
            }

            $entreprise = isset($data["entreprise"]) ? trim(htmlspecialchars($data["entreprise"], ENT_QUOTES | ENT_HTML5)) : null;
            $contenu = isset($data["contenu"]) ? trim(htmlspecialchars($data["contenu"], ENT_QUOTES | ENT_HTML5)) : null;
            
            // Vérifier que si les champs sont fournis, ils ne sont pas vides
            if (($entreprise !== null && empty($entreprise)) || ($contenu !== null && empty($contenu))) {
                 http_response_code(400);
                 echo json_encode(["error" => "L'entreprise et le contenu ne peuvent pas être vides lors de la mise à jour."]);
                 exit;
            }

            $updated = false;
            foreach ($descriptions as &$desc) {
                if ($desc["id"] == $id) {
                    if ($entreprise !== null) {
                        $desc["entreprise"] = $entreprise;
                    }
                    if ($contenu !== null) {
                        $desc["contenu"] = $contenu;
                    }
                    $updated = true;
                    break;
                }
            }

            if ($updated) {
                writeData($descriptions);
                $updatedItem = null;
                foreach($descriptions as $item) {
                    if ($item['id'] == $id) {
                        $updatedItem = $item;
                        break;
                    }
                }
                echo json_encode(["status" => "updated", "updated_item" => $updatedItem]);
            } else {
                http_response_code(404);
                echo json_encode(["error" => "Aucune description trouvée avec cet ID pour la mise à jour."]);
            }

        } else if ($method === "DELETE") {
            $id = isset($data["id"]) ? filter_var($data["id"], FILTER_VALIDATE_INT) : false;
            if ($id === false) {
                http_response_code(400);
                echo json_encode(["error" => "ID invalide pour la suppression."]);
                exit;
            }
            $descriptions = array_values(array_filter($descriptions, fn($desc) => $desc["id"] != $id));
            writeData($descriptions);
            echo json_encode(["status" => "deleted"]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Méthode non autorisée"]);
}
?>
