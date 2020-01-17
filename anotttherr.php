<? foreach ($arResult["ITEMS"] as $i => $arItem):
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            switch ($i) {
                case(0):
                    $case = 'bgd1';
                    break;
                case(1):
                    $case = 'bgd2';
                    break;
                case(2):
                    $case = 'bgd2';
                    break;
                case(3):
                    $case = 'bgd3';
                    break;
                default:
                    $case = 'bgd4';
                    break;
}
 ?>