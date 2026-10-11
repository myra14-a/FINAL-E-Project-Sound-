# Copies the songs into the project with the correct names.
# Put this file next to the "songs" folder (the extracted songs.zip), then run run-copy-songs.bat
param([string]$Songs = (Join-Path $PSScriptRoot "songs"), [string]$Project = "")
if (-not $Project) { $Project = Read-Host "Project folder path (the folder that contains 'public' and 'resources')" }
$Project = $Project.Trim('"')
$items = @(
    @{ g="arijit"; to="agar-tum-saath-ho.mp3"; from="Agar Tum Saath Ho  Tamasha  Alka Yagnik Arijit Singh  Lyrics Song_1791621929341.mp3" },
    @{ g="arijit"; to="sitaare.mp3"; from="Sitaare (From ikkis) - Arijit Singh (Lyrics)  7clouds Hindi_1791622006721.mp3" },
    @{ g="arijit"; to="darkhast.mp3"; from="Arijit Singh - Darkhaast (Lyrics) Ft. Sunidhi Chauhan  Shivaay_1791621985092.mp3" },
    @{ g="arijit"; to="gehra-huwa.mp3"; from="Gehra Hua Eclipsa Audio_1791622199283.mp3" },
    @{ g="arijit"; to="humdard.mp3"; from="Humdard - Arijit Singh  Ek villain  Jo Tu Mera Humdard Hai_1791622175824.mp3" },
    @{ g="arijit"; to="ilahi.mp3"; from="Ilahi song lyrics  Yeh Jawaani Hai Deewani  Arijit singh_1791622167132.mp3" },
    @{ g="arijit"; to="keseriya.mp3"; from="Kesariya (Lyrics) Full Song - Brahmastra  Arijit Singh  Kesariya Tera Ishq Hai Piya_1791622247978.mp3" },
    @{ g="arijit"; to="sanam-re.mp3"; from="Sanam Re - Arijit Singh (Lyrics)  Lyrical Bam Hindi_1791622270126.mp3" },
    @{ g="arijit"; to="satranga.mp3"; from="Satranga Mashup  Kesariya  Alvin Jax & Animesh LoFi  Love Chillout Mashup  Pehle Bhi Main_1791622409618.mp3" },
    @{ g="arijit"; to="sooraj-dooba-hain.mp3"; from="SOORAJ DOOBA HAIN_1791622316979.mp3" },
    @{ g="arijit"; to="rabta.mp3"; from="Arijit Singh - Raabta (Lyrics Video) Agent Vinod  Saif Ali Khan , Kareena Kapoor Khan._1791622276905.mp3" },
    @{ g="arijit"; to="tujhe-kitna-chane-lage-hum.mp3"; from="Tujhe kitna Chahne Lage - Arijit Singh (Lyrics)  Lyrical Bam Hindi_1791622368752.mp3" },
    @{ g="arijit"; to="chaleya.mp3"; from="Chaleya (Lyrics) - Jawan  Shah Rukh Khan  Nayanthara  Atlee, Anirudh  Arijit Singh  Shilpa Rao_1791622284872.mp3" },
    @{ g="shaan"; to="dil-leke.mp4"; from="dil leke.mp4" },
    @{ g="shaan"; to="wo-ladki-hain-kahan.mp4"; from="wo lrki h kaha.mp4" },
    @{ g="shaan"; to="bum-bum-bole.mp4"; from="bum bum bolai.mp4" },
    @{ g="shaan"; to="dus-bahane.mp4"; from="dus bahane.mp4" },
    @{ g="shaan"; to="chaar-kadam.mp4"; from="chaar kadam.mp4" },
    @{ g="shaan"; to="my-dil-goes-mmmm.mp4"; from="my dil goes hmm.mp4" },
    @{ g="shaan"; to="hey-shona.mp4"; from="hey shona.mp4" },
    @{ g="atif"; to="woh-lamhe.aac"; from="wo lamhe.aac" },
    @{ g="atif"; to="o-meri-laila.mp4"; from="o meri laila.mp4" },
    @{ g="atif"; to="pheli-nazar-mein.mp4"; from="pheli nazar.mp4" },
    @{ g="atif"; to="dekhte-dekhte.mp4"; from="dekhte dekhte.mp4" }
)
$ok = 0; $missing = @()
foreach ($i in $items) {
    $dir = Join-Path $Project ("public\users\music-files\" + $i.g)
    New-Item -ItemType Directory -Force -Path $dir | Out-Null
    $src = Get-ChildItem -LiteralPath $Songs -File | Where-Object { $_.Name -eq $i.from } | Select-Object -First 1
    if (-not $src) {
        # fall back to matching the first 25 characters (in case the file name differs slightly)
        $key = $i.from.Substring(0, [Math]::Min(25, $i.from.Length))
        $src = Get-ChildItem -LiteralPath $Songs -File | Where-Object { $_.Name.StartsWith($key) } | Select-Object -First 1
    }
    if ($src) { Copy-Item -LiteralPath $src.FullName -Destination (Join-Path $dir $i.to) -Force; $ok++ }
    else { $missing += $i.from }
}
Write-Host "Copied $ok of $($items.Count) songs."
if ($missing.Count) { Write-Host "Not found:"; $missing | ForEach-Object { Write-Host " - $_" } }
