<?
class CHISLO {
    private $arr = array('', 'один', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять', 'десять',
                         'одиннадцать', 'двенадцать', 'тринадцать', 'четырнадцать', 'пятнадцать',
                         'шестнадцать', 'семнадцать', 'восемнадцать', 'девятнадцать');
    private $arr2 = array('', 'сто', 'двести', 'триста', 'четыреста');
    private $ar = array(
        1=>array('тысяч', 'тысяча', 'тысячи', 'тысячи', 'тысячи', 'тысяч', 'тысяч', 'тысяч', 'тысяч', 'тысяч'),
        array('миллионов', 'миллион', 'миллиона', 'миллиона', 'миллиона', 'миллионов', 'миллионов',
              'миллионов', 'миллионов', 'миллионов'),
        array('миллиардов', 'миллиард', 'миллиарда', 'миллиарда', 'миллиарда', 'миллиардов', 'миллиардов',
              'миллиардов', 'миллиардов', 'миллиардов'),
        array('триллионов', 'триллион', 'триллиона', 'триллиона', 'триллиона', 'триллионов', 'триллионов',
              'триллионов', 'триллионов', 'триллионов')
    );
 
    public function get_chislo($ch) {
        if( $ch<1000 )
            return $this->get_100($ch);
        $ch = preg_split('/(?=(\d{3})+(?!\d))/is', $ch, -1, PREG_SPLIT_NO_EMPTY);
        $ch = array_reverse($ch);
        $result[] = $this->get_100($ch[0]);
        for($i=1; $i<count($ch); $i++) {
            @$result[] = $this->get_100($ch[$i]) .' '. $this->ar[$i]{$ch[$i]%10};
        }
        $result[1] = str_replace('один', 'одна', $result[1]);
        // $result[1] = str_replace('два', 'две', $result[1]);
        return join(' ', array_reverse($result));
    }
    private function get_100($ch) {
        $c1 = (int)($ch / 100);
        $c2 = $ch % 100;
        if( $c1<5 )
            $result = $this->arr2[$c1];
        else 
            $result = $this->arr[$c1] . 'сот';
        return @$result .' '. $this->get_10($c2);
    }
    private function get_10($ch) {
        $c1 = (int)($ch / 10);
        $c2 = $ch % 10;
        if( $ch<20 ) {
            $result = $this->arr[$ch];
        } else if( $ch<40 ) {
            $result = $this->arr[$c1] . 'дцать';
        } else if( $ch<50 ) {
            $result = 'сорок';
        } else if( $ch<90 ) {
            $result = substr( $this->arr[$c1], 0, -1 ) . 'десят';
        } else if( $ch<100 ) {
            $result = 'девяносто';
        }
        if( $ch>20 && $c2!=0 )
            $result .= ' ' . $this->arr[$c2];
        return $result;
    }
}?>