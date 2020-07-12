<?php

include "config/conn.php";

function getPageData($pageId) {
    $sql = <<<EOT
SELECT p.id AS PAGE_ID, p.NAME AS PAGE_NAME, c.id AS CHAPTER_ID, c.NAME AS CHAPTER_NAME, 
    l.id AS LESSON_ID, l.NAME AS LESSON_NAME, l.IS_FREE as IS_FREE_LESSON
FROM lesson l
RIGHT JOIN chapter c ON l.chapter_id = c.id
RIGHT JOIN PAGE p ON c.page_id = p.id
WHERE p.id = $pageId
EOT;
    
    $result = @mysql_query($sql);

    $pageData = array();
    while ($row = mysql_fetch_assoc($result)) {
        if ($row['LESSON_NAME'] == null) continue;
        if (array_key_exists($row['CHAPTER_NAME'], $pageData)) {
            array_push($pageData[$row['CHAPTER_NAME']], $row);
        } else {
            $pageData[$row['CHAPTER_NAME']] = array($row);
        }
    }
    
    return $pageData;
}

function pageContent($pageId) {
    $content = "<div id=\"videos_list\">\n<ul>";

    $pageData = getPageData($pageId);
    foreach ($pageData as $key => $value) {
        $content = $content . "<li class=\"title\">" . $key . "</li>";
        foreach ($value as $lesson) {
            if ($lesson['IS_FREE_LESSON'] == 1) {
            $content = $content . "<li><a href=\"javascript:void(0)\" onclick=\"showFreeContent();\"><span class=\"video\">" . $lesson['LESSON_NAME'] . "</span></a></li>";
            } else {
            $content = $content . "<li><a href=\"javascript:void(0)\" onclick=\"showConfirmBox();\"><span id=\"grey\" class=\"video\">" . $lesson['LESSON_NAME'] . "</span></a></li>";    
            }
        }
    }
    $content = $content . "</ul></div>";
    return $content;
}

?>
