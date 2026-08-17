<?php


class Controller {

    /**
     * Render a view file.
     *
     * @param string $view  View filename without .php extension (e.g. 'login', 'chef')
     * @param array  $data  Associative array of variables to expose inside the view
     */
    public function render(string $view, array $data = []): void {
        // Always pass baseUrl to every view
        $data['baseUrl'] = defined('BASE_URL') ? BASE_URL : '/dinecast';

        // Extract so keys become variables in the view scope
        extract($data);
       
        $viewFile = '../app/Views/' . $view . '.php';

        if (!file_exists($viewFile)) {
            http_response_code(500);
            echo "<h1>500 – View not found: {$view}</h1>";
            return;
        }

        require $viewFile;
    }

    protected function renderWithLayout(
        string $view,
        string $layout,
        array $data = []
    ): void {
        $data['baseUrl'] = defined('BASE_URL') ? BASE_URL : '/dinecast';
    
        extract($data);
    
        $viewFile = __DIR__ . '/../Views/' . $view . '.php';
        $layoutFile = __DIR__ . '/../Views/' . $layout . '.php';
    
        if (!file_exists($viewFile)) {
            http_response_code(500);
            echo "<h1>View not found: {$view}</h1>";
            return;
        }
    
        if (!file_exists($layoutFile)) {
            http_response_code(500);
            echo "<h1>Layout not found: {$layout}</h1>";
            return;
        }
    
        ob_start();
        require $viewFile;
        $content = ob_get_clean();
    
        require $layoutFile;
    }
}