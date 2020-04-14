<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';
$params = require 'pass.php';
$password = $params['password'];
// Переменные, которые отправляет пользователь

function getCaptcha($SecretKey)
{
  $Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . SECRET_KEY . "&response={$SecretKey}");
  $return = json_decode($Response);
  return $return;
}

$return = getCaptcha($_POST['token']);

if ($return->success == true && $return->score > 0.2) {
  $mail = new PHPMailer(true);

  try {
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->isHTML(true);
    $mail->SMTPAuth = true;

    //    $mail->Host = 'smtp.yandex.com';
    //    $mail->Username = 'info@appelsin.tech'; // имя пользователя yandex

    $mail->Host = 'smtp.gmail.com';
    $mail->Username = 'mrpelkin@gmail.com'; // имя пользователя google
    $mail->Password = $password; // пароль на google


    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

//        $mail->setFrom('mrpelkin@gmail.com', 'Отправитель');
//        $mail->addAddress('mrpelkin@gmail.com', 'Получатель');
    $mail->setFrom('info@appelsin.tech', 'Отправитель');
    $mail->addAddress('info@appelsin.tech', 'Получатель');

    if ($_POST['nameForm'] == "briefing") {
      $questionsBrief = json_decode($_POST['questions']);

      $listQuestions = [];

      foreach ($questionsBrief as $item) {
        $listQuestions[] = "<li style='margin-bottom: 15px;'> <span style='font-size: 18px; font-weight: bold;'>$item->label</span> <br> <span style='font-size: 18px;'>$item->answers</span> </li>";
      }
      $questionsBrief = implode('', $listQuestions);

      $company_name = htmlspecialchars($_POST['company']);
      $function_person = htmlspecialchars($_POST['function_person']);
      $phone = htmlspecialchars($_POST['phone']);
      $site = htmlspecialchars($_POST['site']);
      $email = htmlspecialchars($_POST['email']);
      $other_contacts = htmlspecialchars($_POST['other_contacts']);

      $message = "<div style='font-size: 20px'>
                        <b>Заявка с апельсина</b>
                        <br>
                        <p>Брифинг проекта</p>
                        <p>Компания: $company_name</p>
                        <p>Контактное лицо, должность: $function_person</p>
                        <p>Телефон: $phone</p>
                        <p>Сайт: $site</p>
                        <p>E-mail: $email</p>
                        <p>Другое (например Skype): $other_contacts</p>
                        <ul>$questionsBrief</ul>
                        </p>
                        <br>
                    </div>";

      $mail->Subject = 'Брифинг '.$email.'';
      $mail->Body = $message;
      $mail->send();

      if ($mail) {
        $script_result['title'] = 'Успешно';
        $script_result['message'] = 'Ваша заявка принята!';
        $script_result['type'] = 'success';
      } else {
        $script_result['title'] = 'Ошибка';
        $script_result['message'] = 'Письмо не отправлено!';
        $script_result['type'] = 'error';
      }
      echo json_encode($script_result);
    } else {
      if (empty(trim($_POST['name']))) {
        $script_result['title'] = 'Ошибка';
        $script_result['input_name'] = 'name';
        $script_result['message'] = 'Поле name не может быть пустым!';
        $script_result['type'] = 'error';
        echo json_encode($script_result);
        exit;
      } else if (empty(trim($_POST['phone']))) {
        $script_result['title'] = 'Ошибка';
        $script_result['input_name'] = 'phone';
        $script_result['message'] = 'Поле phone не может быть пустым!';
        $script_result['type'] = 'error';
        echo json_encode($script_result);
        exit;
      } else if (empty(trim($_POST['email']))) {
        $script_result['title'] = 'Ошибка';
        $script_result['input_name'] = 'email';
        $script_result['message'] = 'Поле email не может быть пустым!';
        $script_result['type'] = 'error';
        echo json_encode($script_result);
        exit;
      } else if (empty(trim($_POST['message']))) {
        $script_result['title'] = 'Ошибка';
        $script_result['input_name'] = 'message';
        $script_result['message'] = 'Поле message не может быть пустым!';
        $script_result['type'] = 'error';
        echo json_encode($script_result);
        exit;
      } else if (!boolval($_POST['checked'])) {
        $script_result['title'] = 'Ошибка';
        $script_result['input_name'] = 'checked';
        $script_result['message'] = 'Подтвердите согласие';
        $script_result['type'] = 'error';
        echo json_encode($script_result);
        exit;
      }
      if ($_FILES['file']) {
        $file = $_FILES['file'];
        $uploadfile = $file['tmp_name'];
        $mail->addAttachment($uploadfile, $file['name']);
      }

      if ($_POST['nameForm'] == "calculate") {
        $user_name = htmlspecialchars($_POST['name']);
        $user_phone = htmlspecialchars($_POST['phone']);
        $user_email = htmlspecialchars($_POST['email']);
        $user_message = htmlspecialchars($_POST['message']);
        $price = $_POST['price'];

        $questions = json_decode($_POST['questions']);

        $listQuestions = [];

        foreach ($questions as $item) {
          $listQuestions[] = "<li> $item </li>";
        }
        $questions = implode('', $listQuestions);

        $message = "<div style='font-size: 20px'>
                        <b>Заявка с апельсина</b>
                        <br>
                        <p>Форма калькулятора</p>
                        <p>Имя: $user_name</p>
                        <p>Телефон: $user_phone</p>
                        <p>Почта: $user_email</p>
                        <p>Выбранные вопросы:
                        <ul>$questions</ul>
                        </p>
                        <p>Текст сообщения: $user_message</p>
                        <br>
                        <p>Примерная стоимость: $price</p>
                    </div>";

        $mail->Subject = 'Заявка '.$user_email.'';
        $mail->Body = $message;
        $mail->send();

        if ($mail) {
          $script_result['title'] = 'Успешно';
          $script_result['message'] = 'Ваша заявка принята!';
          $script_result['type'] = 'success';
        } else {
          $script_result['title'] = 'Ошибка';
          $script_result['message'] = 'Письмо не отправлено!';
          $script_result['type'] = 'error';
        }
        echo json_encode($script_result);
      } else if ($_POST['nameForm'] == "contacts") {
        $user_name = htmlspecialchars($_POST['name']);
        $user_phone = htmlspecialchars($_POST['phone']);
        $user_email = htmlspecialchars($_POST['email']);
        $user_message = htmlspecialchars($_POST['message']);
        $message = "<div style='font-size: 20px'>
                        <b>Заявка с апельсина</b>
                        <br>
                        <p>Форма контактов</p>
                        <p>Имя: $user_name</p>
                        <p>Телефон: $user_phone</p>
                        <p>Почта: $user_email</p>
                        <p>Текст сообщения: $user_message</p>
                        <br>
                    </div>";


        $mail->Subject = 'Заявка '.$user_email.'';
        $mail->Body = $message;
        $mail->send();

        if ($mail) {
          $script_result['title'] = 'Успешно';
          $script_result['message'] = 'Ваша заявка принята!';
          $script_result['type'] = 'success';
        } else {
          $script_result['title'] = 'Ошибка';
          $script_result['message'] = 'Письмо не отправлено!';
          $script_result['type'] = 'error';
        }
        echo json_encode($script_result);
      } else if ($_POST['nameForm'] == "cases") {
        $user_name = htmlspecialchars($_POST['name']);
        $user_phone = htmlspecialchars($_POST['phone']);
        $user_email = htmlspecialchars($_POST['email']);
        $user_message = htmlspecialchars($_POST['message']);
        $message = "<div style='font-size: 20px'>
                        <b>Заявка с апельсина</b>
                        <br>
                        <p>Форма кейсов</p>
                        <p>Имя: $user_name</p>
                        <p>Телефон: $user_phone</p>
                        <p>Почта: $user_email</p>
                        <p>Текст сообщения: $user_message</p>
                        <br>
                    </div>";


        $mail->Subject = 'Заявка '.$user_email.'';
        $mail->Body = $message;
        $mail->send();

        if ($mail) {
          $script_result['title'] = 'Успешно';
          $script_result['message'] = 'Ваша заявка принята!';
          $script_result['type'] = 'success';
        } else {
          $script_result['title'] = 'Ошибка';
          $script_result['message'] = 'Письмо не отправлено!';
          $script_result['type'] = 'error';
        }
        echo json_encode($script_result);
      }
    }
  } catch (Exception $e) {
    echo json_encode([

      'title' => 'Ошибка',
      'message' => $mail->ErrorInfo,
      'type' => 'error'
    ]);
  }
} else {
  $captcha_result['title'] = 'Ошибка';
  $captcha_result['message'] = 'You are Robot';
  $captcha_result['type'] = 'server';
  $captcha_result['captcha'] = $return;
  echo json_encode($captcha_result);
  exit;
}
