<?php

function special_ucwords($string)
{
  $words = explode(' ', strtolower(trim(preg_replace("/\s+/", ' ', $string))));
  $return[] = ucfirst($words[0]);

  unset($words[0]);

  foreach ($words as $word)
  {
    if (!preg_match("/^([dn]?[aeiou][s]?|em)$/i", $word))
    {
      $word = ucfirst($word);
    }
    $return[] = $word;
  }

  $term = implode(' ', $return);
  $term = ucfirst($term);

  return $term;
}

function nameInitials($string,$maxwords=1,$link=False)
{
  $words = explode(' ', strtolower(trim(preg_replace("/\s+/", ' ', $string))));

  if (count($words)>$maxwords){
    foreach ($words as $word)
    {
      if (!preg_match("/^([dn]?[aeiou][s]?|em)$/i", $word))
      {
        $letters[] = substr($word,0,1);
      }
    }

    $initials = implode('',$letters);
  } else {
    return $string;
  }

  if ($link && count($words)>$maxwords){
    return '<a title="'.$string.'" href="#">'.strtoupper($initials).'</a>';
  } else {
    return strtoupper($initials);
  }
}

function strContains($strComplete,$str)
{
  $strComplete = (string) $strComplete;
  $str = (string) $str;

  if (strpos($strComplete,$str)===False){
    return false;
  } else {
    //dd($strComplete.' - '.$str);
    return true;
  }
}

function br($qtd)
{
  $br = '';
  for ($i=0;$i<$qtd;$i++){
    $br .= '<br>';
  }
  return $br;
}

function nbsp($qtd)
{
  $spaces = '';
  for ($i=0;$i<$qtd;$i++){
    $spaces .= '&nbsp;';
  }
  return $spaces;
}

function getRandMessage()
{
  $messages = [
    '"Uma vida não questionada não merece ser vivida." (Platão)',
    '"O livro é um mestre que fala mas que não responde." (Platão)',
    '"A coisa mais indispensável a um homem é reconhecer o uso que deve fazer do seu próprio conhecimento." (Platão)',
    '"A parte que ignoramos é muito maior que tudo quanto sabemos." (Platão)',
    '"O ignorante afirma, o sábio duvida, o sensato reflete." (Aristóteles)',
    '"Eu não procuro saber as respostas, procuro compreender as perguntas." (Confúcio)',
    '"O sábio nunca diz tudo o que pensa, mas pensa sempre tudo o que diz." (Aristóteles)',
    '"O saber é saber que nada se sabe. Esta é a definição do verdadeiro conhecimento." (Confúcio)',
    '"Não basta conquistar a sabedoria, é preciso usá-la." (Cícero)',
    '"Muitas palavras não indicam necessariamente muita sabedoria." (Tales de Mileto)',
    '"É fazendo que se aprende a fazer aquilo que se deve aprender a fazer." (Aristóteles)',
    '"Só sei que nada sei." (Sócrates)',
  ];

  $i = array_rand($messages);

  return $messages[$i];
}
