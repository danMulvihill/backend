<?php
// functions
function makeReturn($res){
    echo "<p>$res</p><button onClick='window.history.back();'>Go Back</button>";
}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comments form</title>
</head>
<body>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // validation
    if(!empty(trim($_POST['name']))){
        $name = $_POST['name'];
    }else{
        $name = NULL;
        $response = "<p>You must enter a name</p>";
        makeReturn($response); return;
    }

    if(!empty(trim(($_POST['mail']))){
        $mail = $_POST['mail'];
        //format validation:
    }else{
        $mail = NULL;
        $response = "You must enter an email address";
        makeReturn($response); return;
    }
    if(!empty(trim($_POST['comment']))){
        $comment = trim($_POST['comment']);

    }else{
        $comment = NULL;
        $response = "You didn't comment! What do you have to say?";
        makeReturn($response); return;
    }
    

    if(isset($_POST['ans'])){
        $ans = $_POST['ans'];
    }else{
        $ans = NULL;
    }

    if ($ans != NULL){
        echo "Your answer: ".$ans;
        switch ($ans){
            case "A":
                echo "<p>Wrong answer to question. You can't throw a window</p>";
                break;
            case "D":
                echo "<p>Correct answer</p>"; 
                break;
            default:
                echo "<p>Your answer is half correct. I'll let you comment.</p>";
        }
    }else{
        $response =  "You must select one answer"; 
        makeReturn($response); return;
    }

    echo "<p>$name said:</p>";
    echo "<blockquote>$comment</blockquote>";

    echo "<p>If you are unhappy with what $name said, 
    he can be contacted at $mail</p>";

    if ($ans != "D"){
        echo "<p>$name doesn't know what and object is. How embarrassing!</p>";
    }
    

}else{ ?>
    <h2>Generic Comment Form</h2> <p>This will evently store data in a database.
    Right now, it just responds to you upon submission. Try it!</p>

    <form action="" method="POST">
    <fieldset>
        <legend>Tell us what you think?</legend>
        <dl>
            <dt>Name:</dt>
            <dd><input type="text" name="name" /></dd>
            <dt>Email:</dt>
            <dd><input type="email" name="mail" /></dd>
            <dt>You must answer this question to comment: What is an Object? </dt>
            <dd>
                <input type="radio" name="ans" value="A" />
                A. Anything you can throw <br />
                <input type="radio" name="ans" value="B" />
                B. A collection of properties <br />
                <input type="radio" name="ans" value="C" />
                C. An instance of a class <br />
                <input type="radio" name="ans" value="D" />
                D. Both B and C </ br>
            </dd>
            <dt>Comments:</dt>
            <dd>
                <textarea row="15" cols="50" name="comment">
                </textarea>
            </dd>
        </dl>
        <p><input type="submit" /></p>
    </fieldset>
    </form>
</body>
</html>

<?php } ?>