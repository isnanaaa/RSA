function registrasi($data){
    global $conn;

    $username = strtolower(striplashes ($data["username"]));
    $password = msqli_real_escape_string($conn, $data["password"]);
    $password2 = msqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah ada atau belum
    msqli_query ($conn, "SELECT username * FROM user WHERE username = '$username'");
    if(msqli_fetch_assoc($result)){
        echo <script type="text/javascript">
                alert('Username sudah ada!');
            </script>";
        return false;
    }

    //cek konfirmasi password
    if($password!== $password2){
        echo "<script>
                alert('Password anda tidak sama!');
            </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan user baru ke database
    msqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password)");

    return msqli_affected_rows($conn);
}