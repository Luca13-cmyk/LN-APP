<?php

use \Hcode\Model\User;
use \Hcode\Model\Cart;
use \Hcode\Model\Category;
use \Hcode\DB\Sql;

	function formatPrice($vlprice)
	{
		if (!$vlprice > 0) $vlprice = 0;
		return number_format( $vlprice, 2, ",", ".");
	}

	function formatDate($date)
	{
		return date("d/m/Y", strtotime($date));
    }
    
    function insertVisits()
    {
        $sql = new Sql();

        $date = date("d/m/Y"); 
        $month = explode("/", $date);
        $month[1];

        $results = $sql->select("CALL sp_visits(:id_calen, :qntd)", array(
            ":id_calen"=>$month[1],
            ":qntd"=>1
        ));
        
        return $results;
    }
    function getCurrentHost($hostpar)
	{
        $URIPER = explode("?", $_SERVER['REQUEST_URI']);
        $dirs = explode("/", $URIPER[0]);
        $host = "/".$dirs[1];
        if ($host === "/admin")
        {
            if ($_SERVER['REQUEST_URI'] === $hostpar) return "active";
            return;
        }
		if ($host === $hostpar)
		{
			return "active";
		}
		
    }
    function filterTagsHeader($hostpar)
    {
        $URIPER = explode("?", $_SERVER['REQUEST_URI']);
        $dirs = explode("/", $URIPER[0]);
        $host = "/".$dirs[1];

        switch ($hostpar) 
        {
            case '/home':
                if ($host === $hostpar)
                {
                    echo '
                    <link rel="stylesheet" type="text/css" href="/res/site/sliderCUBO/css/demo.min.css" />
                    <link rel="stylesheet" type="text/css" href="/res/site/sliderCUBO/css/slicebox.min.css" />
                    <link rel="stylesheet" type="text/css" href="/res/site/sliderCUBO/css/custom.min.css" />
                    <script type="text/javascript" src="/res/site/sliderCUBO/js/modernizr.custom.46884.js"></script>
                    ';
                }
            break;
        }
        
    }
    function filterTagsFooter($hostpar)
    {
        $URIPER = explode("?", $_SERVER['REQUEST_URI']);
        $dirs = explode("/", $URIPER[0]);
        $host = "/".$dirs[1];
        
        switch ($hostpar) 
        {
            case '/home':
                if ($host === $hostpar)
                {
                    echo '
                    <script type="text/javascript" src="/res/site/sliderCUBO/js/jquery.slicebox.min.js"></script>
                    <script src="/res/site/sliderCUBO/js/sliderCUB.min.js"></script>
                    ';
                }
            break;
        }
        
    }
    function sliderCUBO()
    {
        if ($_SERVER["REQUEST_URI"] === "/home")
        {
            return true;
        }
        return false;
    }

	function querySearch(Object $model, $domain)
	{
		$search = (isset($_GET["search"])) ? $_GET["search"] : "";

		$page = (isset($_GET["page"])) ? (int)$_GET["page"] : 1;

		if ($search != "")
		{
			$pagination =  $model->getPageSearch($search, $page);
			
		} else 
		{
			$pagination =  $model->getPage($page);
		}

		$pages = [];

		for ($i=0; $i < $pagination["pages"]; $i++) 
		{ 
			array_push($pages, [
				"href"=>$domain.http_build_query([
					"page"=>$i+1,
					"search"=>$search
				]),
				"text"=>$i+1
			]);
		}
		$values = [
			"pagination"=>$pagination["data"],
			"search"=>$search,
            "pages"=>$pages,
            "total"=>$pagination["total"]
		];
		return $values;

    }


	function checkLogin($inadmin = true)
	{
	
		return User::checkLogin($inadmin);
	
	}
	
	function getUserName()
	{
	
		$user = User::getFromSession();
	
		return $user->getdesperson();
	
    }
    function getAvatar()
    {
        $user = User::getFromSession();
	
		return $user->getdesphotoavatar();
    }
	function dateRegister()
	{

		$user = User::getFromSession();
	
		return $user->getdtregister();
	
	}
	function getCartNrQtd()
	{
		$cart = Cart::getFromSession();

		$totals = $cart->getProductsTotals();

		return $totals["nrqtd"];
	}
	function getCartVlSubTotal()
	{
		$cart = Cart::getFromSession();

		$totals = $cart->getProductsTotals();

		return formatPrice($totals["vlprice"]);
	}
    

    function showVisitors($insert, $return = false)
    {
        $sql = new Sql();

        if ($insert)
        {
            $sql->query("
                INSERT INTO tb_visits (desip, dessystem)
                VALUES(:desip, :dessystem);
        
        ", [
            ":desip"=>$_SERVER["REMOTE_ADDR"],
            ":dessystem"=>$_SERVER['HTTP_USER_AGENT']
            ]);
        }
        
        if ($return)
        {
            $return = $sql->select("SELECT * FROM tb_visitors");
            return $return;
            
        }


        // fazer com procedure quando for jogar no servidor !!
    }
    function delVisitors()
    {
        $sql = new Sql();

        $sql->query("TRUNCATE TABLE tb_visitors;");
        
    }

?>