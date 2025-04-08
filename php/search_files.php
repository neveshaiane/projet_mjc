<style>
    /* Styles pour la barre de recherche et les tuiles */
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    .search-bar {
        width: 80%;
        max-width: 600px;
        margin: 20px auto;
        padding: 10px;
        border: 3px solid #A2EAF2;
        border-radius: 12px;
        font-size: 1.2em;
    }

    .file-tile {
        font-size: 1em;
        width: 28%;
        max-width: 300px;
        height: 200px;
        border: 3px solid #A2EAF2;
        border-radius: 12px;
        background-color: #F2D0C4;
        text-align: center;
        padding: 20px;
        cursor: pointer;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .file-tile img, .file-tile canvas {
        max-width: 80%;
        max-height: 80%;
        align-self: center;
    }

    #file-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        width: 100%;
    }

    .download-icon {
        position: absolute;
        bottom: 10px;
        right: 10px;
        width: 45px;
        height: 45px;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s;
    }

    .file-tile:hover .download-icon {
        opacity: 1;
    }

    .download-icon img {
        width: 40px;
        height: 40px;
    }
</style>

<?php
function normalizeString($string) {
    // Convert to lowercase, replace underscores and spaces with a single space, and trim
    return strtolower(preg_replace('/[\s_]+/', ' ', trim($string)));
}

function searchFiles($directory, $searchTerm) {
    $allowedExtensions = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'jpg', 'png', 'jpeg', 'gif', 'mp3', 'wav', 'mp4', 'avi', 'mkv'];
    $results = [];
    $normalizedSearchTerm = normalizeString($searchTerm);

    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
    foreach ($files as $file) {
        if ($file->isFile()) {
            $extension = pathinfo($file->getFilename(), PATHINFO_EXTENSION);
            $normalizedFileName = normalizeString($file->getFilename());
            if (in_array($extension, $allowedExtensions) && stripos($normalizedFileName, $normalizedSearchTerm) !== false) {
                $results[] = [
                    'path' => str_replace(__DIR__ . '/../', '', $file->getPathname()),
                    'name' => $file->getFilename()
                ];
            }
        }
    }

    return $results;
}

$baseDirectory = __DIR__ . '/../html'; // Adjust the base directory as needed
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$results = searchFiles($baseDirectory, $searchTerm);

if (!empty($results)) {
    echo '<div id="file-list">';
    foreach ($results as $file) {
        echo '<div class="file-tile">';
        // Affichage du nom du fichier au-dessus de l'aperçu
        echo '<p style="margin-bottom: 10px; font-size: 0.9em; color: #333; font-weight: bold;">' . htmlspecialchars($file['name']) . '</p>';
        echo '<a href="' . $file['path'] . '" target="_blank" style="text-decoration: none; color: inherit;">';
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        if (in_array($extension, ['jpg', 'png', 'jpeg', 'gif'])) {
            // Aperçu des images
            echo '<img src="' . $file['path'] . '" alt="' . htmlspecialchars($file['name']) . '">';
        } elseif ($extension === 'pdf') {
            // Aperçu des PDF avec pdf.js
            echo '<canvas class="pdf-preview" data-pdf="' . $file['path'] . '"></canvas>';
        } else {
            // Aperçu pour les autres fichiers
            echo '<p>' . htmlspecialchars($file['name']) . '</p>';
        }
        echo '</a>';
        echo '<a href="' . $file['path'] . '" download class="download-icon">';
        echo '<img src="../../../media/telechargement.png" alt="Download">';
        echo '</a>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo '<p>Aucun document trouvé pour "' . htmlspecialchars($searchTerm) . '".</p>';
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
<script>
    // Fonction pour afficher les aperçus des PDF
    document.addEventListener('DOMContentLoaded', function () {
        const pdfPreviews = document.querySelectorAll('.pdf-preview');
        pdfPreviews.forEach(canvas => {
            const pdfPath = canvas.getAttribute('data-pdf');
            const loadingTask = pdfjsLib.getDocument(pdfPath);
            loadingTask.promise.then(pdf => {
                pdf.getPage(1).then(page => {
                    const viewport = page.getViewport({ scale: 1.0 });
                    canvas.width = viewport.width;
                    canvas.height = viewport.height;
                    const context = canvas.getContext('2d');
                    const renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };
                    page.render(renderContext);
                });
            });
        });
    });
</script>
