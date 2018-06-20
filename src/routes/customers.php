<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

// Get para veiculos

$app->get('/api/customers', function(Request $request, Response $response){
    $sql = "SELECT * FROM veiculos";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $customers = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($customers);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Get Single Customer
$app->get('/api/customer/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');

    $sql = "SELECT * FROM veiculos WHERE id = $id";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $customer = $stmt->fetch(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($customer);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Add 
$app->post('/api/customer/add', function(Request $request, Response $response){
    $veiculo = $request->getParam('veiculo');
    $marca = $request->getParam('marca');
    $ano = $request->getParam('ano');
    $descricao = $request->getParam('descricao');
    $vendido = $request->getParam('vendido');
    $created = $request->getParam('created');
    $updated = $request->getParam('updated');

    $sql = "INSERT INTO veiculos (veiculo,marca,ano,descricao,vendido,row,row) VALUES
    (:veiculo,:marca,:ano,:descricao,:vendido,:created,:updated)";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':veiculo', $veiculo);
        $stmt->bindParam(':marca',  $marca);
        $stmt->bindParam(':ano',      $ano);
        $stmt->bindParam(':descricao',      $descricao);
        $stmt->bindParam(':vendido',    $vendido);
        $stmt->bindParam(':created',       $created);
        $stmt->bindParam(':created',      $updated);

        $stmt->execute();

        echo '{"notice": {"text": "Customer Added"}';

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Update Customer
$app->put('/api/customer/update/{id}', function(Request $request, Response $response){

    $veiculo = $request->getParam('veiculo');
    $marca = $request->getParam('marca');
    $ano = $request->getParam('ano');
    $descricao = $request->getParam('descricao');
    $vendido = $request->getParam('vendido');
    $created = $request->getParam('created');
    $updated = $request->getParam('updated');


    $sql = "UPDATE veiculos SET
				veiculo   = :veiculo,
				marca 	  = :marca,
                ano		  = :ano,
                descricao = :descricao,
                vendido   = :vendido,
                created   = :created,
                updated	  = :updated
			WHERE id = $id";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':veiculo', $veiculo);
        $stmt->bindParam(':marca',  $marca);
        $stmt->bindParam(':ano',      $ano);
        $stmt->bindParam(':descricao',      $descricao);
        $stmt->bindParam(':vendido',    $vendido);
        $stmt->bindParam(':created',       $created);
        $stmt->bindParam(':created',      $updated);


        $stmt->execute();

        echo '{"notice": {"text": "Customer Updated"}';

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Delete Customer
$app->delete('/api/customer/delete/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');

    $sql = "DELETE FROM veiculos WHERE id = $id";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $db = null;
        echo '{"notice": {"text": "Customer Deleted"}';
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});