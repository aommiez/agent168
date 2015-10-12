<?php

if(mail("papangping@gmail.com",
    "contact from agent168th backend" ,
    "Name: xxxx
    ========================
    Email: xxxx@xxx.com
    ========================
    Message: mxxxx
    ========================
    Telephone: txxxxx
    ========================"
  )){
  echo "send mail success.";
}
else {
  echo "Can't send mail.";
}
exit();
