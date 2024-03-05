<?php
class User
{
	public string $name= 'username';
    const NAME="Произошел вызов классa пользователь";
    public  static int $count=0;
    public static function getNAME() :string
    {
       return "\r\n" . " self class=" . self::NAME . "\r\n" . " static class=" . static::NAME;
    }
    protected string $email;
	protected string $password='';
	protected function setPassword( string $password ) 
	{
		$this->password = $password;	
	}
	public function getEmail() : string
	{
		return $this->email;
	}
	public function display(string $field) : string
	{
		return $this->$field;
	}
    public function getcount() :int
    {
        return User::$count;
    }
}
class Article
{
    public string $title;
    const NAME="Класс статья";
    public string $data;
    public string $author;
    public static int $count = 0;
    public function __construct( string $title, string $data, string $author)
    {
        $this->title = $title;
        $this->data = $data;
        $this->author = $author;
        Article::$count++;
    }
    public function  setTitle(string $title) :void
    {
        $this->title = $title;
    }
    public function setData() :void
    {

    }
    public function getinfo() :string
    {
        return "Статья " . $this->title . "   автора " . $this->author . " вышла " . $this->data;
    }
}
class NewspaperArticle extends Article
{
   public int $page;
    const NAME="Класс газатная статья";
   public int $length;
   public string $nameNewspaper;
   public function __construct(string $title, string $data, string $author, int $page, int $length, string $nameNewspaper)
   {
       parent::__construct($title,$data,$author);
       $this->page = $page;
       $this->length = $length;
       $this->nameNewspaper = $nameNewspaper;
   }
   public function getinfo() :string
   {
       return parent::getinfo()." выщла в газете ".$this->nameNewspaper." на ".$this->page." странице";
   }
    public static function getCount() {
        return Article::$count;
    }


}
class WhoUser extends User
{
	public string $rightsUser;
    const NAME="Произошел вызов классa кто этот пользователь";
    public int $ageUser;
   	public function __construct(string $name, string $email, string $password)
	{
        $this->name = $name;
		$this->email = $email;
		$this->setpassword($password);
        User::$count++;
	}
    public function __clone()
    {

    }
	public function setRightUser(string $rightsUser) : void
	{
		$this->rightsUser= $rightsUser;
	}
	public function setAgeUser(string $ageUser) : void
	{
		$this->ageUser= $ageUser;
	}
	public function displayRightUser() : string
	{
		if ($this->rightsUser == 'админ')
		{
			return "пользователь: ".parent::display('name')." ".$this->ageUser." года адрес электронной почты: ".parent::display('email')." имеет полный доступ аминистратора";
		} else {
			return "пользователь: ".parent::display('name')." ".$this->ageUser." года " . "адрес электронной почты: ".parent::display('email')." имеет ограниченный доступ гостя";
        }
    }
}
$user1 = new WhoUser('Анатолий','adad@mail.ru', '12345');
echo $user1->getNAME();
$user1->setRightUser('админ');
$user1->setAgeUser('24');
$user2 = new WhoUser('Дмитрий','adima@mail.ru', '54321');
$user2->setRightUser('гость');
$user2->setAgeUser('33');
echo "\r\n" . $user2->displayRightUser();
echo   "\r\n" . "Всего " . User::$count . " зарегистрированных пользователя";

$artiles = [];
$artile1 = new NewspaperArticle('Фантомас','10.12.1976','Пушкин А.С.',17,3, 'Московские известия');
$artiles[] = $artile1;
$artile1 = new NewspaperArticle('Фантомас разбушевался','12.11.1977','Пушкин А.С.',3,1, 'Московские известия');
$artiles[] = $artile1;
$artile2 = new NewspaperArticle('Фантомас возвращается','10.12.1978','Пушкин А.С.',5,2, 'Московские известия');
$artiles[] = $artile2;
foreach ($artiles as $art)
{
    echo  "\r\n" . $art->getinfo();
}
echo   "\r\n" . "Всего " . NewspaperArticle::getCount() . " стати";

