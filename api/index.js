const express = require('express')
const nodeMailer = require('nodemailer')
const multer = require('multer')
const upload = multer()
const bodyParser = require('body-parser');
const fetch = require('isomorphic-fetch');

const app = express()
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended: false}));

// Require API routes
app.post('/', upload.single('file'), function (req, res) {
  const secret_key = process.env.SECRET_KEY;
  const token = req.body.token;
  const url = `https://www.google.com/recaptcha/api/siteverify?secret=${secret_key}&response=${token}`;

  fetch(url, {
    method: 'post'
  })
    .then(response => response.json())
    .then(google_response => {
      if(google_response.success) {
        mail()
      }
    })
    .catch(error => {
      res.status(500)
      res.json({error})
    });
  // res.json({google_response})
  let mail = () => {
    let transporter = nodeMailer.createTransport({
      host: 'smtp.yandex.com',
      port: 587,
      secure: true,
      auth: {
        // should be replaced with real sender's account
        user: 'info@appelsin.tech',
        pass: 'HJd2S54Aks3dfd'
      }
    });
    let bodyEmail;
    if (req.body.formId === 'calc') {
      bodyEmail = `<div style='font-size: 20px'>
                    <b>Заявка с апельсина</b>
                    <br>
                    <p>Контактное лицо: ${req.body.name}</p>
                    <p>Телефон: ${req.body.phone}</p>
                    <p>E-mail: ${req.body.email}</p>
                    <p>Сообщение: ${req.body.message}</p>
                    <p>Выбранные вопросы: </p>
                    <ul>${req.body.questions}</ul>
                    <p>Цена по калькулятору: ${req.body.price}</p>
                    </p>
                    <br>
                </div>`
    } else if (req.body.formId === 'brief') {
      bodyEmail = `<div style='font-size: 20px'>
                    <b>Заявка с апельсина</b>
                    <br>
                    <p>Брифинг проекта</p>
                    <p>Компания: ${req.body.company}</p>
                    <p>Контактное лицо, должность: ${req.body.name}</p>
                    <p>Телефон: ${req.body.phone}</p>
                    <p>Сайт: ${req.body.site}</p>
                    <p>E-mail: ${req.body.email}</p>
                    <p>Другое (например Skype): ${req.body.other_contacts}</p>
                    <p>Список полей:</p>
                    <ul>${req.body.questions}</ul>
                    </p>
                    <br>
                </div>
    `
    } else {
      bodyEmail = `<div style='font-size: 20px'>
              <b>Заявка с апельсина</b>
              <br>
              <p>Контактное лицо: ${req.body.name}</p>
              <p>Телефон: ${req.body.phone}</p>
              <p>E-mail: ${req.body.email}</p>
              <p>Сообщение: ${req.body.message}</p>
              </p>
              <br>
          </div>`
    }

    let mailOptions = {
      // should be replaced with real recipient's account
      to: 'info@appelsin.tech',
      subject: `Заявка ${req.body.name}`,
      html: bodyEmail
    };
    if (req.file) {
      mailOptions.attachments = [{
        filename: req.file.originalname,
        content: req.file.buffer
      }]
    }
    transporter.sendMail(mailOptions, (error, info) => {
      if (error) {
        return console.log(error);
      }
    });
    res.end();
  }
  //
})

app.get('/', function (req, res) {
  res
    .status(200)
    .send(res.json(req.ip))
})
// Import API Routes
// app.use(mail)

// Export the server middleware
module.exports = {
  path: '/api/mail',
  handler: app
}
