<?php
$servername = "localhost";
$username = "root";
$password = "Etlh0505";
$dbname = "control_esolar";


    
    
 
 function requestStudentName($studentId) {

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    

    $sql = "SELECT id FROM alumnos WHERE id = $studentId";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
    
        $sql = "SELECT Nombre FROM usuarios WHERE id = $studentId";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        $studentName= $row['Nombre'];

    }else{
        echo "unknown student";
        $conn->close(); 
        return;

    }

    $conn->close(); 
    return $studentName;

 }

 function requestStudentGroupName($studentId) {

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id FROM alumnos WHERE id = $studentId";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
    
    $sql = "SELECT id_Grupo FROM lista_grupos WHERE id_Alumno = $studentId";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    $groupId= $row['id_Grupo'];

    $sql = "SELECT nombre FROM grupo WHERE id = $groupId";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    $groupName= $row['nombre'];
    }else{
        echo "unknown student";
        $conn->close(); 
        return; 

    }

    $conn->close(); 
    return $groupName; 
     
}


 function requestScheduleStudent($studentId) {

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $teacherName = array();
    $className = array();
    $roomName = array();
    $schedule = array();
    $times = array(); 


$sql = "SELECT id FROM alumnos WHERE id = $studentId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $sql = "SELECT id_Grupo FROM lista_grupos WHERE id_Alumno = $studentId";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    $groupId= $row['id_Grupo'];

    
    $sql = "SELECT id_Profesor, id_Materia, id_Salon, Horario  FROM horarios WHERE id_Grupo = $groupId";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
       

        $teacherId =$row["id_Profesor"];
        $classId= $row["id_Materia"];
        $roomId = $row["id_Salon"];
        array_push($schedule,$row["Horario"]);
        

        $sql = "SELECT Nombre  FROM usuarios WHERE id = $teacherId";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        $teacherNameTemp= $row['Nombre'];

        $sql = "SELECT nombre  FROM materia WHERE id = $classId";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        $classNameTemp= $row['nombre'];

        $sql = "SELECT nombre  FROM salones WHERE id = $roomId";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        $roomNameTemp= $row['nombre'];

        array_push($teacherName,$teacherNameTemp);
        array_push($className,$classNameTemp);
        array_push($roomName,$roomNameTemp);

      }
      array_push($times,$teacherName,$className,$roomName,$schedule);
    
} else {
    echo "unknown student";
    $conn->close(); 
    return;
}

$conn->close(); 
return $times;
}


function requestTeacherName($teacherId) {

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    

    $sql = "SELECT id FROM profesores WHERE id = $teacherId";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
    
        $sql = "SELECT Nombre FROM usuarios WHERE id = $teacherId";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        $teacherName= $row['Nombre'];

    }else{
        echo "unknown Teacher";
        $conn->close(); 
        return;

    }

    $conn->close(); 
    return $teacherName;

 }

 function requestScheduleTeacher($teacherId) {

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $groupName = array();
    $className = array();
    $roomName = array();
    $schedule = array();
    $times = array(); 


$sql = "SELECT id FROM profesores WHERE id = $teacherId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {



    
    $sql = "SELECT id_Materia, id_Salon, id_Grupo, Horario  FROM horarios WHERE id_Profesor = $$teacherId";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        
        $groupId = $row["id_Grupo"];
        $classId= $row["id_Materia"];
        $roomId = $row["id_Salon"];
        array_push($schedule,$row["Horario"]);

        $sql = "SELECT nombre  FROM grupo WHERE id = $groupId";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        $groupNameTemp= $row['Nombre'];

        $sql = "SELECT nombre  FROM materia WHERE id = $classId";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        $classNameTemp= $row['nombre'];

        $sql = "SELECT nombre  FROM salones WHERE id = $roomId";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        $roomNameTemp= $row['nombre'];

        array_push($groupName,$groupNameTemp);
        array_push($className,$classNameTemp);
        array_push($roomName,$roomNameTemp);

      }
      array_push($times,$groupName,$className,$roomName,$schedule);
    
} else {
    echo "unknown teacher";
    $conn->close(); 
    return;
}

$conn->close(); 
return $times;
}

function requestScheduleAdministrative() {

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
 
    $teacherName = array();
    $roomName = array();
    $schedule = array();
    $times = array(); 


    $sql = "SELECT id_Profesor, id_Salon, Horario  FROM horarios ";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {


        $teacherId =$row["id_Profesor"];
        $roomId = $row["id_Salon"];
        array_push($schedule,$row["Horario"]);

        
        $sql = "SELECT Nombre  FROM usuarios WHERE id = $teacherId";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        $teacherNameTemp= $row['Nombre'];


        $sql = "SELECT nombre  FROM salones WHERE id = $roomId";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        $roomNameTemp= $row['nombre'];

        array_push($groupName,$groupNameTemp);
        array_push($className,$classNameTemp);
        array_push($roomName,$roomNameTemp);

      }
      array_push($times,$groupName,$className,$roomName,$schedule);

      $conn->close(); 
      return $times;
   
}

    

?>


