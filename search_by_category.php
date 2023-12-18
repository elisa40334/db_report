<!DOCTYPE html>
<html lang="zh-TW">

<!--RWD好難 我放棄QQ-->

<head>

    <meta charset="UTF-8">
    <title>查詢頁面</title>
    <link rel="stylesheet" href="index.css">
    <style>
        fieldset {
            margin-bottom: 20px;
        }

        label {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <header>

        <div class="header-top">
            <div class="logo">
                <img src="resource/logo.png" alt="海大logo" width="75%">
            </div>
        </div>

    </header>

    <main>
    <form>
        <table>
            <tbody>
                <tr>
                    <td>
                        <span id="Span7" ml="PL_關鍵字查詢">關鍵字查詢</span>：
                    </td>
                    <td>
                        <form action="search.php" method="POST">
                            <span id="radioButtonClass">
                                <input id="radioButtonClass_0" type="radio" name="radioButtonClass" value="0" checked="checked">
                                <label for="radioButtonClass_0">名字</label>

                                <input id="radioButtonClass_1" type="radio" name="radioButtonClass" value="1">
                                <label for="radioButtonClass_1">職位</label>

                                <input id="radioButtonClass_2" type="radio" name="radioButtonClass" value="2">
                                <label for="radioButtonClass_2">薪水</label>
                            </span>

                            <select id="salaryType" style="display: none;">
                                <option value="min">最低薪資</option>
                                <option value="max">最高薪資</option>
                            </select>

                            <input name="searchName" type="text" maxlength="64" id="searchName" style="display: inline-block;">
                            
                            <input type="submit" name="QUERY_BTN7" value="查詢" id="QUERY_BTN7" class="btn" style="border: 1px solid #000; padding-top: 3px; padding-bottom: 3px;"  ml="CB_關鍵字查詢">
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>

    <script>
        // Function to show or hide the salaryType select and searchName input based on the radio button selection
        function toggleInputVisibility() {
            const radioButtonValue = document.querySelector('input[name="radioButtonClass"]:checked').value;
            const salaryTypeSelect = document.getElementById('salaryType');
            const qChLessonInput = document.getElementById('searchName');

            if (radioButtonValue === '2') {
                salaryTypeSelect.style.display = 'inline-block';
                qChLessonInput.style.display = 'none';
            } else {
                salaryTypeSelect.style.display = 'none';
                qChLessonInput.style.display = 'inline-block';
            }
        }

        // Attach the toggleInputVisibility function to the change event of radio buttons
        const radioButtons = document.querySelectorAll('input[name="radioButtonClass"]');
        radioButtons.forEach(radioButton => {
            radioButton.addEventListener('change', toggleInputVisibility);
        });
    </script>

    </main>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
    <!--引用bootstrap-->
</body>

</html>