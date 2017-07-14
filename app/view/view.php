<?php

class View {

    // шаблон по умолчанию
    public $template = 'layout.tpl.php';

    // данные для вывода на страницу
    public $data;

    public $html;

    /**
     * Вывод страницы
     * @param null $data
     * @param null $template
     */
    public function render($data = null, $template = null) {
        $this->data = $data;

        if(file_exists(__DIR__ . '/' . $template . '.tpl.php')) {
            $this->html =  include_once(__DIR__ . '/' . $template . '.tpl.php');
        } else {
            $this->html =  include_once (__DIR__ . '/' . $this->template);
        }

        return $this->html;
    }

    /**
     * @return mixed
     */
    public function pagination($totalRecords) {

        $currentPage = (int)($_POST['page'] ?? 1);
        $html = '';
        $totalPage = $totalRecords / ON_PAGE;

        if($totalRecords > ON_PAGE) {
            for($i = 1; $i <= $totalPage; ++$i) {
                $html .= '<div class="btn js-pagination' . ($i != $currentPage ? ' btn-default' : '') . '">' . $i . '</div>';
            }
            $this->html .= $html;
        }

        return $this->html;
    }
}