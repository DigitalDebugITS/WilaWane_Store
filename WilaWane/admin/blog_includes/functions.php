<?php 
// Admin user variables
// ... varaibles here ...

// Topics variables
$topic_id = 0;
$isEditingTopic = false;
$topic_name = "";

/* - - - - - - - - - - 
-  Admin users actions
- - - - - - - - - - -*/
// ... 

/* - - - - - - - - - - 
-  Topic actions
- - - - - - - - - - -*/
// if user clicks the create topic button
if (isset($_POST['create_topic'])) { createTopic($_POST); }
// if user clicks the Edit topic button
if (isset($_GET['edit-topic'])) {
        $isEditingTopic = true;
        $topic_id = $_GET['edit-topic'];
        editTopic($topic_id);
}
// if user clicks the update topic button
if (isset($_POST['update_topic'])) {
        updateTopic($_POST);
}
// if user clicks the Delete topic button
if (isset($_GET['delete-topic'])) {
        $topic_id = $_GET['delete-topic'];
        deleteTopic($topic_id);
}


/* - - - - - - - - - - - -
-  Admin users functions
- - - - - - - - - - - - -*/
// ...

/* - - - - - - - - - - 
-  Topics functions
- - - - - - - - - - -*/
// get all topics from DB
function getAllTopics() {
        global $con;
        $sql = "SELECT * FROM topics";
        $result = mysqli_query($con, $sql);
        $topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $topics;
}
function createTopic($request_values){
        global $con, $errors, $topic_name;
        $topic_name = esc($request_values['topic_name']);
        // create slug: if topic is "Life Advice", return "life-advice" as slug
        $topic_slug = makeSlug($topic_name);
        // validate form
        if (empty($topic_name)) { 
                array_push($errors, "Topic name required"); 
        }
        // Ensure that no topic is saved twice. 
        $topic_check_query = "SELECT * FROM topics WHERE slug='$topic_slug' LIMIT 1";
        $result = mysqli_query($con, $topic_check_query);
        if (mysqli_num_rows($result) > 0) { // if topic exists
                array_push($errors, "Topic already exists");
        }
        // register topic if there are no errors in the form
        if (count($errors) == 0) {
                $query = "INSERT INTO topics (name, slug) 
                                  VALUES('$topic_name', '$topic_slug')";
                mysqli_query($con, $query);

                $_SESSION['message'] = "Topic created successfully";
                header('location: topics.php');
                exit(0);
        }
}
/* * * * * * * * * * * * * * * * * * * * *
* - Takes topic id as parameter
* - Fetches the topic from database
* - sets topic fields on form for editing
* * * * * * * * * * * * * * * * * * * * * */
function editTopic($topic_id) {
        global $con, $topic_name, $isEditingTopic, $topic_id;
        $sql = "SELECT * FROM topics WHERE id=$topic_id LIMIT 1";
        $result = mysqli_query($con, $sql);
        $topic = mysqli_fetch_assoc($result);
        // set form values ($topic_name) on the form to be updated
        $topic_name = $topic['name'];
}
function updateTopic($request_values) {
        global $con, $errors, $topic_name, $topic_id;
        $topic_name = esc($request_values['topic_name']);
        $topic_id = esc($request_values['topic_id']);
        // create slug: if topic is "Life Advice", return "life-advice" as slug
        $topic_slug = makeSlug($topic_name);
        // validate form
        if (empty($topic_name)) { 
                array_push($errors, "Topic name required"); 
        }
        // register topic if there are no errors in the form
        if (count($errors) == 0) {
                $query = "UPDATE topics SET name='$topic_name', slug='$topic_slug' WHERE id=$topic_id";
                mysqli_query($con, $query);

                $_SESSION['message'] = "Topic updated successfully";
                header('location: topics.php');
                exit(0);
        }
}
// delete topic 
function deleteTopic($topic_id) {
        global $con;
        $sql = "DELETE FROM topics WHERE id=$topic_id";
        if (mysqli_query($con, $sql)) {
                $_SESSION['message'] = "Topic successfully deleted";
                header("location: topics.php");
                exit(0);
        }
}