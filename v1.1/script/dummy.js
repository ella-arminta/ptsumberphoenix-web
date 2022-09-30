$(document).ready((function () {
    var n = 0;
    arr_id = [];
    var o = 0,
        r = "PAMERAN_ADIWARNA_2022_1";
    arr_profile_pic = [];
    var e, d = new URLSearchParams(window.location.search);

    function i(n) {
        for (var o, r, e = n.length; 0 !== e;) r = Math.floor(Math.random() * e), o = n[e -= 1], n[e] = n[r], n[r] = o;
        return n
    }

    function a(o) {
        $.ajax({
            url: "services/gettotalkarya.php",
            method: "POST",
            async: !1,
            data: {
                table: r,
                offline: o
            },
            success: function (o) {
                n = o.total;
                for (var r = 1; r <= n; r++) arr_id.push(r)
            },
            error: function (n) {
                console.log(n.responseText)
            }
        })
    }

    function t() {
        $.ajax({
            url: "services/getallkarya.php",
            method: "GET",
            async: !1,
            success: function (n) {
                for (var r = 0; r < n.length; r++) {
                    var e = "https://drive.google.com/uc?export=view&id=" + n[r].link_foto_diri.split("/")[5];
                    arr_profile_pic.push(e)
                }
                arr_profile_pic = i(arr_profile_pic), $(".maincard#two .maincardinside").css("background-image", "url(" + arr_profile_pic[o] + ")"), o += 1, o %= arr_profile_pic.length
            }
        })
    }
    d.has("search") && (e = d.get("search"), $.ajax({
        url: "services/getsearchid.php",
        method: "GET",
        async: !1,
        data: {
            keyword: e
        },
        success: function (n) {
            arr_id = [];
            for (var o = 0; o < n.length; o++) arr_id.push(n[o].id);
            var r = '\n        <center style="color: white;font-family:FT88;font-size:1rem">Total Works by Keyword "' + e + '" : ' + n.length + "</center>\n        ";
            $(".firsthome").append(r), c(0), $([document.documentElement, document.body]).scrollTop($(".firsthome").offset().top)
        },
        error: function (n) {
            console.log(n.responseText)
        }
    })), t();
    window.setInterval((function () {
        let n = new Image;
        n.onload = function () {
            $(".maincard#two .maincardinside").css("background-image", "url(" + n.src + ")"), document.body.style.backgroundImage = "url('NaN"
        }, n.src = arr_profile_pic[o], o += 1, o %= arr_profile_pic.length
    }), 7e3);

    function c(n) {
        selected_id = [];
        for (var o = Math.min(arr_id.length, 16), e = 0; e < o; e++) selected = Math.floor(Math.random() * arr_id.length), selected_id.push(arr_id[selected]), selected > -1 && arr_id.splice(selected, 1);
        $.ajax({
            url: "services/getsixteen.php",
            method: "POST",
            async: !1,
            data: {
                arr_id: selected_id,
                table: r
            },
            success: function (n) {
                n = i(n);
                for (var o = 0; o < n.length; o++) {
                    var r = "https://drive.google.com/uc?export=view&id=" + n[o].link_main_image.split("/")[5];
                    if (0 == o) {
                        var e = '\n                        <div class="row firstrowhome">\n                            <div class="col-12 col-md-4 firstrowfirstcol one">\n                                <a target="_blank" href="./detail.php?noweb=' + n[o].no_web + '">\n                                    <div class="content d-flex justify-content-end p-4" style="background:url(\'' + r + '\');background-size: cover;background-position:center;">\n              <p class="curatedinfo">\n                                        ' + ("A" == n[o].no_web[0] ? "Curated" : "") + "\n                                        </p>\n                                        </div>\n                                </a>\n                            </div>\n                        </div>\n                        ";
                        $(".firsthome").last().append(e)
                    }
                    if (1 == o) {
                        e = '\n                        <div class="col-12 col-md-4 firstrowsecondcol">\n                            <div class="row secondcolrow two" id="two">\n                                <a target="_blank" href="./detail.php?noweb=' + n[o].no_web + '">\n                                    <div class="content d-flex justify-content-end p-4"  style="background:url(\'' + r + '\');background-size: cover;background-position:center;">\n                                    <p class="curatedinfo">\n                                        ' + ("A" == n[o].no_web[0] ? "Curated" : "") + "\n                                        </p>\n                                    \n                                    </div>\n                                </a>\n                            </div>\n                        </div>\n                        ";
                        $(".firstrowhome").last().append(e)
                    }
                    if (2 == o) {
                        e = '\n                            <div class="row secondcolrow three" id="three">\n                                <a target="_blank" href="./detail.php?noweb=' + n[o].no_web + '">\n                                    <div class="content d-flex justify-content-end p-4"  style="background:url(\'' + r + '\');background-size: cover;background-position:center;">\n                                    <p class="curatedinfo">\n                                        ' + ("A" == n[o].no_web[0] ? "Curated" : "") + "\n                                        </p>\n                                    \n                                    </div>\n                                </a>\n                            </div>\n                        ";
                        $(".firstrowsecondcol").last().append(e)
                    }
                    if (3 == o) {
                        e = '\n                        <div class="col-12 col-md-4 firstrowthirdcol four">\n                            <a target="_blank" href="./detail.php?noweb=' + n[o].no_web + '">\n                                <div class="content d-flex justify-content-end p-4"  style="background:url(\'' + r + '\');background-size: cover;background-position:center;">\n                                <p class="curatedinfo">\n                                        ' + ("A" == n[o].no_web[0] ? "Curated" : "") + "\n                                        </p>\n                                \n                                </div>\n                            </a>\n                        </div>\n                        ";
                        $(".firstrowhome").last().append(e)
                    }
                    if (4 == o) {
                        e = '\n                        <div class="row secondrowhome">\n                            <div class="col-12 col-md-4 secondrowfirstcol five">\n                                <a target="_blank" href="./detail.php?noweb=' + n[o].no_web + '">\n                                    <div class="content d-flex justify-content-end p-4"  style="background:url(\'' + r + '\');background-size: cover;background-position:center;">\n                                    <p class="curatedinfo">\n                                        ' + ("A" == n[o].no_web[0] ? "Curated" : "") + "\n                                        </p>\n                                    \n                                    </div>\n                                </a>\n                            </div>\n                        </div>\n                        ";
                        $(".firsthome").last().append(e)
                    }
                    if (5 == o) {
                        e = '\n                        <div class="col-12 col-md-4 secondrowsecondcol six">\n                            <a target="_blank" href="./detail.php?noweb=' + n[o].no_web + '">\n                                <div class="content d-flex justify-content-end p-4"  style="background:url(\'' + r + '\');background-size: cover;background-position:center;">\n                                <p class="curatedinfo">\n                                        ' + ("A" == n[o].no_web[0] ? "Curated" : "") + "\n                                        </p>\n                                \n                                </div>\n                            </a>\n                        </div>\n                        ";
                        $(".secondrowhome").last().append(e)
                    }
                    if (6 == o) {
                        e = '\n                        <div class="col-12 col-md-4 secondrowthirdcol seven">\n                            <a target="_blank" href="./detail.php?noweb=' + n[o].no_web + '">\n                                <div class="content d-flex justify-content-end p-4"  style="background:url(\'' + r + '\');background-size: cover;background-position:center;">\n                                <p class="curatedinfo">\n                                        ' + ("A" == n[o].no_web[0] ? "Curated" : "") + "\n                                        </p>\n                                \n                                </div>\n                            </a>\n                        </div>\n                        ";
                        $(".secondrowhome").last().append(e)
                    }
                    if (7 == o) {
                        e = '\n                        <div class="row thirdrowhome">\n                            <div class="col-12 col-md-6 thirdrowfirstcol">\n                                <div class="row thirdrowfirstrow">\n                                    <div class="col-12 thirdfirstrowfirstcol eight">\n                                    <a target="_blank" href="./detail.php?noweb=' + n[o].no_web + '">\n                                    <div class="content d-flex justify-content-end p-4"  style="background:url(\'' + r + '\');background-size: cover;background-position:center;">\n                                    <p class="curatedinfo">\n                                        ' + ("A" == n[o].no_web[0] ? "Curated" : "") + "\n                                        </p>\n                                    \n                                    </div>\n                                </a>\n                                    </div>\n                                </div>\n                            </div>\n                        </div>\n                        ";
                        $(".firsthome").last().append(e)
                    }
                    if (8 == o) {
                        e = '\n                        <div class="col-12 col-md-6 thirdrowsecondcol">\n                            <div class="row thirdrowsecondrow">\n                                <div class="col-12 thirdsecondrowfirstcol nine">\n                                <a target="_blank" href="./detail.php?noweb=' + n[o].no_web + '">\n                                <div class="content d-flex justify-content-end p-4"  style="background:url(\'' + r + '\');background-size: cover;background-position:center;">\n                                <p class="curatedinfo">\n                                        ' + ("A" == n[o].no_web[0] ? "Curated" : "") + "\n                                        </p>\n                                \n                                </div>\n                            </a>\n                                </div>\n                            </div>\n                        </div>\n                        ";
                        $(".thirdrowhome").last().append(e)
                    }
                    if (9 == o) {
                        e = '\n                        <div class="row thirdrowthirdrow">\n                            <div class="col-12 col-md-6 thirdthirdrowfirstcol ten">\n                            <a target="_blank" href="./detail.php?noweb=' + n[o].no_web + '">\n                            <div class="content d-flex justify-content-end p-4"  style="background:url(\'' + r + '\');background-size: cover;background-position:center;">\n                            <p class="curatedinfo">\n                                        ' + ("A" == n[o].no_web[0] ? "Curated" : "") + "\n                                        </p>\n                            \n                            </div>\n                        </a>\n                            </div>\n                        </div>\n                        ";
                        $(".thirdrowsecondcol").last().append(e)
                    }
                    if (10 == o) {
                        e = '\n                        <div class="col-12 col-md-6 thirdthirdrowsecondcolcontainer">\n                            <div class="row thirdthirdrowsecondcolfirstrow eleven">\n                            <a target="_blank" href="./detail.php?noweb=' + n[o].no_web + '">\n                            <div class="content d-flex justify-content-end p-4"  style="background:url(\'' + r + '\');background-size: cover;background-position:center;">\n                            <p class="curatedinfo">\n                                        ' + ("A" == n[o].no_web[0] ? "Curated" : "") + "\n                                        </p>\n                            \n                            </div>\n                        </a>\n                            </div>\n                        </div>\n                        ";
                        $(".thirdrowthirdrow").last().append(e)
                    }
                    if (11 == o) {
                        e = '\n                        <div class="row thirdthirdrowsecondcolsecondrow twelve">\n                            <a target="_blank" href="./detail.php?noweb=' + n[o].no_web + '">\n                                <div class="content d-flex justify-content-end p-4"  style="background:url(\'' + r + '\');background-size: cover;background-position:center;">\n                                <p class="curatedinfo">\n                                        ' + ("A" == n[o].no_web[0] ? "Curated" : "") + "\n                                        </p>\n                                \n                                </div>\n                            </a>\n                        </div>\n                        ";
                        $(".thirdthirdrowsecondcolcontainer").last().append(e)
                    }
                    if (12 == o) {
                        e = '\n                        <div class="row thirdrowfourthrow">\n                            <div class="col-12 col-md-8 thirdfourthrowfirstcol thirteen">\n                                <a target="_blank" href="./detail.php?noweb=' + n[o].no_web + '">\n                                    <div class="content d-flex justify-content-end p-4"  style="background:url(\'' + r + '\');background-size: cover;background-position:center;">\n                                    <p class="curatedinfo">\n                                        ' + ("A" == n[o].no_web[0] ? "Curated" : "") + "\n                                        </p>\n                                    \n                                    </div>\n                                </a>\n                            </div>\n                        </div>\n                        ";
                        $(".thirdrowfirstcol").last().append(e)
                    }
                    if (13 == o) {
                        e = '\n                        <div class="col-12 col-md-4 thirdfourthrowsecondcol fourteen">\n                            <a target="_blank" href="./detail.php?noweb=' + n[o].no_web + '">\n                                <div class="content d-flex justify-content-end p-4"  style="background:url(\'' + r + '\');background-size: cover;background-position:center;">\n                                    <p class="curatedinfo">\n                                        ' + ("A" == n[o].no_web[0] ? "Curated" : "") + "\n                                        </p>\n                                \n                                </div>\n                            </a>\n                        </div>\n                        ";
                        $(".thirdrowfourthrow").last().append(e)
                    }
                    if (14 == o) {
                        e = '\n                        <div class="row thirdrowfifthrow">\n                            <div class="col-12 thirdfifthrowfirstcol fifteen">\n                                <a target="_blank" href="./detail.php?noweb=' + n[o].no_web + '">\n                                    <div class="content d-flex justify-content-end p-4"  style="background:url(\'' + r + '\');background-size: cover;background-position:center;">\n              <p class="curatedinfo">\n              ' + ("A" == n[o].no_web[0] ? "Curated" : "") + "\n              </p>\n                                    \n                                    </div>\n                                </a>\n                            </div>\n                        </div>\n                        ";
                        $(".thirdrowsecondcol").last().append(e)
                    }
                    if (15 == o) {
                        e = '\n                        <div class="row thirdrowsixthrow">\n                            <div class="col-12 thirdsixthrowfirstcol sixteen">\n                                <a target="_blank" href="./detail.php?noweb=' + n[o].no_web + '">\n                                    <div class="content d-flex justify-content-end p-4"  style="background:url(\'' + r + '\');background-size: cover;background-position:center;">\n                                    <p class="curatedinfo">\n                                        ' + ("A" == n[o].no_web[0] ? "Curated" : "") + "\n                                        </p>\n                                    \n                                    </div>\n                                </a>\n                            </div>\n                        </div>\n                        ";
                        $(".thirdrowfirstcol").last().append(e)
                    }
                }
                $(".content").lazy()
            },
            error: function (n) {
                console.log(n.responseText)
            }
        })
    }
    t(), window.addEventListener("scroll", (() => {
        window.scrollY + window.innerHeight >= document.documentElement.scrollHeight - 200 && 0 != arr_id.length && c()
    })), $(".maincard#one").click((function () {
        arr_id = [], $(".firsthome").empty(), r = "PAMERAN_ADIWARNA_2022_1", a("offline"), randomid = Math.floor(Math.random() * n) + 1, randomidx = String(randomid), randomid > 42 && (randomidx = String(randomid - 42)), console.log(randomid), randomidx = randomidx.padStart(3, "0"), randomid > 42 ? randomidx = "B" + randomidx : randomidx = "A" + randomidx, randomidx = "./detail.php?noweb=" + randomidx;
        var o = '\n                <div class="shufflelogo">\n                    <a target="_blank" href="' + randomidx + '">\n                        <img src="./assets/images/random_icon.png" alt="">\n                    </a>\n                </div>\n                 \n                ';
        $(".firsthome").append(o), $(".shufflelogo").click((function () {
            randomid = Math.floor(Math.random() * n) + 1, randomidx = String(randomid), randomid > 42 && (randomidx = String(randomid - 42)), console.log(randomid), randomidx = randomidx.padStart(3, "0"), randomid > 42 ? randomidx = "B" + randomidx : randomidx = "A" + randomidx, randomidx = "./detail.php?noweb=" + randomidx, $(".shufflelogo a").attr("href", randomidx)
        })), c(), $([document.documentElement, document.body]).scrollTop($(".firsthome").offset().top)
    })), $(".maincard#two").click((function () {
        arr_id = [], $(".firsthome").empty(), r = "PAMERAN_ADIWARNA_2022_1", a("mix"), randomid = Math.floor(Math.random() * n) + 1, randomidx = String(randomid), randomid > 42 && (randomidx = String(randomid - 42)), randomidx = randomidx.padStart(3, "0"), randomid > 42 ? randomidx = "B" + randomidx : randomidx = "A" + randomidx, randomidx = "./detail.php?noweb=" + randomidx;
        var o = '\n                <div class="shufflelogo">\n                    <a target="_blank" href="' + randomidx + '">\n                        <img src="./assets/images/random_icon.png" alt="">\n                    </a>\n                </div>\n                ';
        $(".firsthome").append(o), $(".shufflelogo").click((function () {
            randomid = Math.floor(Math.random() * n) + 1, randomidx = String(randomid), randomid > 42 && (randomidx = String(randomid - 42)), console.log(randomid), randomidx = randomidx.padStart(3, "0"), randomid > 42 ? randomidx = "B" + randomidx : randomidx = "A" + randomidx, randomidx = "./detail.php?noweb=" + randomidx, $(".shufflelogo a").attr("href", randomidx)
        })), c(), $([document.documentElement, document.body]).scrollTop($(".firsthome").offset().top)
    })), $(".maincard#three").click((function () {
        window.location.href = "./event.php"
    })), $(".maincard#four .maincardinside").click((function () {
        window.location.href = "./about.php"
    }))
}));