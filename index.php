<!DOCTYPE html>
<html lang="zh-TW">

<!--RWD好難 我放棄QQ-->

<head>
    <meta charset="UTF-8">
    <title>海大教職員資訊查詢系統</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="index.js">
</head>

<body>
    <header>
        <div class="header-top">
            <div class="logo">
                <img src="resource/logo.png" alt="海大logo" width="75%">
            </div>
            <div class="combined-sections">
                <div class="search-bar">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="搜尋..."
                            style="background-color: rgb(94, 97, 101)">
                        <button class="btn btn-secondary search-button" type="button" id="button-addon2"
                            style="background: url('resource/magnifier.png') no-repeat center center; background-size: contain; "></button>
                    </div>
                </div>
                <!--hover會跑掉算了css真的好難QQ-->
                <div class="dropdown">
                    <button class="btn hamburger" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                        style="background: url('resource/ham.png') no-repeat center center; background-size: contain; height: 35px; width: 35px;"></button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addModal">新增</button></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="header-bottom">
            <div class="column-container">
                <div class="column" style="border-left: none;">
                    學術單位
                    <div class="dropdown-content" id="academic">
                        <!-- 動態加入 -->
                        <a href="unit.php?unit=電機資訊學院" class="link">電機資訊學院</a>
                        <a href="unit.php?unit=123學院" class="link">123學院</a>
                    </div>
                </div>
                <div class="column">
                    行政單位
                    <div class="dropdown-content" id="administrative">
                        <!-- 動態加入 -->
                        <a href="unit.php">test-a</a>
                        <a href="unit.php">test-b</a>
                    </div>
                </div>
                <div class="column">
                    校友公關
                    <div class="dropdown-content" id="alumni">
                        <!-- 動態加入 -->
                        <a href="unit.php">test-a</a>
                        <a href="unit.php">test-b</a>
                    </div>
                </div>
                <div class="column">
                    研究中心及其他
                    <div class="dropdown-content" id="research">
                        <!-- 動態加入 -->
                        <a href="unit.php">test-a</a>
                        <a href="unit.php">test-b</a>
                    </div>
                </div>
                <div class="column">
                    馬祖
                    <div class="dropdown-content" id="matsu">
                        <!-- 動態加入 -->
                        <a href="unit.php">test-a</a>
                        <a href="unit.php">test-b</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="resource/1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="resource/2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="resource/3.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>


        <!-- 懸浮視窗 -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">新增資料</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div style="text-align: center;">
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <button type="button" class="btn btn-secondary" onclick="showUnitForm()">單位</button>
                                <button type="button" class="btn btn-secondary" onclick="showDepartmentForm()">部門</button>
                                <button type="button" class="btn btn-secondary" onclick="showEmployeeForm()">員工</button>
                            </div>
                        </div>    
                        <div class="form-container mt-3">
                            <form id="unit-form" style="display: none;">
                                <div class="mb-3">
                                    <label for="UId" class="form-label">UId</label>
                                    <input type="text" class="form-control" id="UId" placeholder="UId">
                                </div>
                                <div class="mb-3">
                                    <label for="UName" class="form-label">UName</label>
                                    <input type="text" class="form-control" id="UName" placeholder="UName">
                                </div>
                                <div class="mb-3">
                                    <label for="Category" class="form-label">Category</label>
                                    <input type="text" class="form-control" id="Category" placeholder="Category">
                                </div>
                            </form>
                            <form id="department-form" style="display: none;">
                                <div class="mb-3">
                                    <label for="DName" class="form-label">DName</label>
                                    <input type="text" class="form-control" id="DName" placeholder="DName">
                                </div>
                                <div class="mb-3">
                                    <label for="DLocation" class="form-label">DLocation</label>
                                    <input type="text" class="form-control" id="DLocation" placeholder="DLocation">
                                </div>
                                <div class="mb-3">
                                    <label for="DPhone" class="form-label">DPhone</label>
                                    <input type="text" class="form-control" id="DPhone" placeholder="DPhone">
                                </div>
                                <div class="mb-3">
                                    <label for="DNet" class="form-label">DNet</label>
                                    <input type="text" class="form-control" id="DNet" placeholder="DNet">
                                </div>
                            </form>
                            <form id="employee-form" style="display: none;">
                                <div class="mb-3">
                                    <label for="EId" class="form-label">EId</label>
                                    <input type="text" class="form-control" id="EId" placeholder="EId">
                                </div>
                                <div class="mb-3">
                                    <label for="EName" class="form-label">EName</label>
                                    <input type="text" class="form-control" id="EName" placeholder="EName">
                                </div>
                                <div class="mb-3">
                                    <label for="EPhone" class="form-label">EPhone</label>
                                    <input type="text" class="form-control" id="EPhone" placeholder="EPhone">
                                </div>
                                <div class="mb-3">
                                    <label for="Address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="Address" placeholder="Address">
                                </div>
                                <div class="mb-3">
                                    <label for="Position" class="form-label">Position</label>
                                    <input type="text" class="form-control" id="Position" placeholder="Position">
                                </div>
                                <div class="mb-3">
                                    <label for="Salary" class="form-label">Salary</label>
                                    <input type="text" class="form-control" id="Salary" placeholder="Salary">
                                </div>
                                <div class="mb-3">
                                    <label for="E_DName" class="form-label">DName</label>
                                    <input type="text" class="form-control" id="E_DName" placeholder="E_DName">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
    <!--引用bootstrap-->
</body>

</html>