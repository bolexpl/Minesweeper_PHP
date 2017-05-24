<?php
session_start();
$title = "Moje rekordy";
$page = "records_user";
require_once "parts/header.php";
?>

<section class="records">

    <?php
    require_once "php/connect.php";

    $db = new PDO('mysql:host=' . $db_host . ";dbname=$db_name;charset=utf8", $db_user, $db_password,
        array(
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        )
    );

    try {
        $sql = "SELECT records.id, user_id, czas, board, login FROM records INNER JOIN users ON records.user_id = users.id WHERE user_id=:user_id ORDER BY records.czas";

        $stmt = $db->prepare($sql);
        $stmt->bindValue(":user_id", $_SESSION['id'], PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() == 0):
            echo "Brak wyników.";
        else:
            ?>
          <table class="table table-bordered table-striped">
            <thead>
            <tr>
              <td>#</td>
              <td>Czas</td>
              <td>Plansza</td>
              <td>Gracz</td>
              <td></td>
            </tr>
            </thead>
            <tbody>

            <?php
            $i = 1;
            foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row):
                ?>
              <tr>
                <td><?= $i++ ?>.</td>
                <td><?= $row['czas'] ?>s</td>
                <td><?= $row['board'] ?></td>
                <td><?= $row['login'] ?></td>
                <td>
                  <a href="php/delete_record.php?id=<?= $row['id'] ?>&page=records_user">
                    <button type="button" class="btn btn-danger">Usuń</button>
                  </a>
                </td>
              </tr>
                <?php
            endforeach;
            ?>

            </tbody>
          </table>
            <?php
        endif;

    } catch (PDOException $e) {
        echo "Błąd pobrania wyników.";
    }
    ?>
</section>


<?php
require_once "parts/footer.php";
?>
