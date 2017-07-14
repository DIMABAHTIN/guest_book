<?php


class Model extends Db {

    //таблица в базе данных
    protected $table = 'guest_book';

    //сортировка по умолчанию
    public $sortBy = 'time';

    private $result = '';

//    public $totalRecords;

    public function __get($name)
    {
        if (method_exists($this, ($method = 'get'.$name)))
        {
            return $this->$method();
        }

        return $this;
    }

    /**
     * Добавление поста
     * @return string
     */
    public function addPost() {

        $homepage = '';

        if(isset($_POST['name']) && !empty($_POST['name'])) {
            $name = htmlspecialchars($_POST['name']);
        } else {

            return 'Name is empty';
        }

        if(isset($_POST['email']) && !empty($_POST['email'])) {
            $email = htmlspecialchars($_POST['email']);

            if (strpos($email, '@') === false)

                return 'E-mail Invalid';
            } else {

            return 'Email is empty';
        }

        if(isset($_POST['homepage'])) {
            $homepage = $_POST['homepage'];
            $homepage = filter_var($homepage, FILTER_VALIDATE_URL);
        }

        if(isset($_POST['text']) && !empty($_POST['text'])) {
            $text = htmlspecialchars($_POST['text']);
        } else {

            return 'Text is empty';
        }

        $stmt = $this->db->prepare("INSERT INTO ". $this->table ." (user_name, email, homepage, text, ip, user_agent, time) 
                                   VALUES (:user_name, :email, :homepage, :text, :ip, :user_agent, :time)");
        $stmt->execute(
            [
                'user_name' => $name,
                'email' => $email,
                'homepage' => $homepage,
                'text' => $text,
                'ip' => $_SERVER['REMOTE_ADDR'],
                'user_agent' => $_SERVER['HTTP_USER_AGENT'],
                'time' => time()
            ]
        );

        if($this->db->lastInsertId()) {

            return $this->getPosts();
        }

        return $this;
    }

    /**
     * Выборка постов
     * @return array
     */
    public function getPosts() {

        $start = 0;

        if(isset($_POST['page'])) {
            $start = ((int)$_POST['page'] - 1) * ON_PAGE;
        }

        $stmt = $this->db->prepare("SELECT * FROM " . $this->table . " ORDER BY :sortby LIMIT :start, :offset");
        $stmt->bindValue(':start', $start, PDO::PARAM_INT);
        $stmt->bindValue(':offset', ON_PAGE, PDO::PARAM_INT);
        $stmt->bindValue(':sortby', $this->getSort());
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $this->result = $stmt->fetchAll();

        return $this->result;
    }

    public function getTotalRecords() {

        return current($this->db->query("SELECT count(*) as c FROM " . $this->table .";")->fetch(PDO::FETCH_OBJ));
    }

    public function pagination() {
        if(count($this->result) > $this->totalRecords) {

        }

    }

    /**
     * @return string
     */
    private function getSort() {

        if(isset($_POST['sortBy']) && $_POST['sortBy'] == 'email') {
            $this->sortBy = 'email';
        }

        if(isset($_POST['sortBy']) && $_POST['sortBy'] == 'name') {
            $this->sortBy = 'user_name';
        }

        if(isset($_SESSION['sort']) && $_SESSION['sort'] == 'desc') {
            return $this->sortBy . ' DESC';
        }

        return $this->sortBy . ' ASC';
    }


    
        

}