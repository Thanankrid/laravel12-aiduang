<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsData = [
            [
                'title' => 'Miss Universe Thailand 2025',
                'summary' => 'ยิ่งใหญ่สมการรอคอยสำหรับการประกวด Miss Universe Thailand 2025 หรือ มิสยูนิเวิร์สไทยแลนด์ 2025 รอบตัดสิน ซึ่งจัดในค่ำคืนวันที่ 23 สิงหาคม 2568 ณ MGI Hall ชั้น 6 ศูนย์การค้า Bravo BKK พระราม 9 โดยเหล่าแฟนนางงามต่างร่วมลุ้นกันอย่างใจจดใจจ่อกันเลยทีเดียว...',
                'content' => file_get_contents(resource_path('news-content/new1.txt')),
                'source' => 'https://www.sanook.com/women/261737/',
                'image' => 'https://i.ytimg.com/vi/ht7DdYnanSY/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLCheS9b-iGzRgmRFAu6zmGuEfHnxQ',
            ],
            [
                'title' => 'BTS ประกาศจัดคอนเสิร์ตออนไลน์',
                'summary' => 'BTS เตรียมจัดคอนเสิร์ตแบบ Virtual Concert ให้แฟน ๆ ทั่วโลก...',
                'content' => file_get_contents(resource_path('news-content/new2.txt')),
                'source' => 'https://thestandard.co/bts-permission-to-dance-on-stage/',
                'image' => 'https://cms.dmpcdn.com/musicarticle/2020/05/14/7cfed8b0-95bf-11ea-8b67-a34093c265b7_original.jpg',
            ],
            [
                'title' => 'พัคซอจุนเผยเตรียมเล่นหนัง Marvel เรื่องใหม่',
                'summary' => 'พัคซอจุนเตรียมรับบทในจักรวาล Marvel...',
                'content' => file_get_contents(resource_path('news-content/new3.txt')),
                'source' => 'https://www.tnnthailand.com/entertainment/106897/',
                'image' => 'https://i0.wp.com/www.korseries.com/wp-content/uploads/2021/06/park-seo-joon-the-marvels.jpg',
            ],
            [
                'title' => 'ญาญ่าเปิดใจหลังละครใหม่กระแสแรง',
                'summary' => 'ญาญ่าเผยความรู้สึกหลังละครใหม่ทำเรตติ้งสูง...',
                'content' => file_get_contents(resource_path('news-content/new4.txt')),
                'source' => 'https://www.facebook.com/ppbt.magazine/posts/%E0%B8%AB%E0%B8%99%E0%B8%B6%E0%B9%88%E0%B8%87%E0%B9%83%E0%B8%99%E0%B8%A3%E0%B9%89%E0%B8%AD%E0%B8%A2-%E0%B8%A1%E0%B8%B2%E0%B9%81%E0%B8%A3%E0%B8%87-%E0%B8%82%E0%B8%B6%E0%B9%89%E0%B8%99%E0%B9%81%E0%B8%97%E0%B9%88%E0%B8%99%E0%B8%A5%E0%B8%B0%E0%B8%84%E0%B8%A3%E0%B8%A5%E0%B8%B0%E0%B8%A1%E0%B8%B8%E0%B8%99%E0%B9%83%E0%B8%88%E0%B9%81%E0%B8%AB%E0%B9%88%E0%B8%87%E0%B8%9B%E0%B8%B5%E0%B8%8A%E0%B8%B2%E0%B8%A7%E0%B9%80%E0%B8%99%E0%B9%87%E0%B8%95%E0%B9%81%E0%B8%AB%E0%B9%88%E0%B8%8A%E0%B8%B7%E0%B9%88%E0%B8%99%E0%B8%8A%E0%B8%A1-%E0%B8%95%E0%B9%88%E0%B8%AD-%E0%B8%8D%E0%B8%B2%E0%B8%8D%E0%B9%88%E0%B8%B2-%E0%B9%80%E0%B8%84%E0%B8%A1%E0%B8%B5%E0%B8%94%E0%B8%B5%E0%B8%95%E0%B9%88%E0%B8%AD%E0%B9%83/1055149793287109/',
                'image' => 'https://assets.ch3plus.com/gallery/activity/2024/09/2409271501052.jpg',
            ],
            [
                'title' => 'Ariana Grande ประกาศทัวร์คอนเสิร์ต',
                'summary' => 'Ariana Grande ประกาศทัวร์คอนเสิร์ตครั้งแรกในรอบ 7 ปี!',
                'content' => file_get_contents(resource_path('news-content/new5.txt')),
                'source' => 'https://www.sanook.com/news/9836606/',
                'image' => 'https://s.isanook.com/ns/0/ud/1967/9836606/arianathumbnail1200x720-v2(1.png?ip/crop/w1200h700/q80/webp',
            ],
            [
                'title' => '“โอปอล สุชาตา” ทำได้! คว้ามงกุฎ Miss World 2025 ให้ไทยเป็นครั้งแรก',
                'summary' => 'โอปอล สุชาตา” ทำได้! คว้ามงกุฎ Miss World 2025 ให้ไทยเป็นครั้งแรกในประวัติศาสตร์ชาติไทย...',
                'content' => file_get_contents(resource_path('news-content/new6.txt')),
                'source' => 'https://www.thairath.co.th/entertain/beauty-pageant/2864560',
                'image' => 'https://image.bangkokbiznews.com/uploads/images/md/2025/05/srHn6Z0lATIYfJarBGpK.webp',
            ],
            [
                'title' => 'เจนนี่ BLACKPINK ร่วมงาน Met Gala 2025',
                'summary' => 'เจนนี่เข้าร่วมงานแฟชั่นสุดหรู Met Gala พร้อมลุคสุดปัง...',
                'content' => file_get_contents(resource_path('news-content/new7.txt')),
                'source' => 'https://thestandard.co/jennie-met-gala-2025/',
                'image' => 'https://files.vogue.co.th/uploads/jennie-kim-met-gala-2025-cms-cover.webp',
            ],
            [
                'title' => 'NCT Dream ทำยอดขายอัลบั้มทะลุ 2 ล้านชุด',
                'summary' => 'อัลบั้มใหม่ของ NCT Dream มียอดขายถล่มทลาย...',
                'content' => file_get_contents(resource_path('news-content/new8.txt')),
                'source' => 'https://music.trueid.net/th-th/detail/MDLevjGGRKp1',
                'image' => 'https://f.ptcdn.info/884/076/000/r9swgk2275ng2Rp905xOv-o.jpg',
            ],
            [
                'title' => 'ใหม่ ดาวิกา กับแฟชั่นเซ็ตใหม่สุดฮอต',
                'summary' => 'ใหม่ ดาวิกา ถ่ายแฟชั่นสุดชิคลงนิตยสารชื่อดัง...',
                'content' => file_get_contents(resource_path('news-content/new9.txt')),
                'source' => 'https://mgronline.com/entertainment/detail/9680000010368',
                'image' => 'https://s.isanook.com/ns/0/ud/1877/9389566/5555.jpg?ip/crop/w670h402/q80/jpg',
            ],
            [
                'title' => '"แพรว แพรววณิชยฐ์" สาวที่มุ่งมั่นตามฝันจนคว้ารองอันดับ 1 MUT 2025',
                'summary' => 'เป็นอีกหนึ่งตัวเต็งในเวทีประกวด Miss Universe Thailand 2025 สำหรับ แพรว แพรววณิชยฐ์ เรืองทอง สาวงามผู้ไม่เคยหยุดฝัน บนเส้นทางสายนางงามที่ไม่ง่าย ซึ่งในปีนี้แพรวก็พกความมั่นใจมาชิงมงกุฎ Miss Universe Thailand 2025...',
                'content' => file_get_contents(resource_path('news-content/new10.txt')),
                'source' => 'https://www.thairath.co.th/entertain/beauty-pageant/2878368',
                'image' => 'https://static.thairath.co.th/media/B6FtNKtgSqRqbnNsbQXnninSgx4dYJpZFMGJsmfag9AGftfxt7B5zCfFDdVsrOvvzC79m.webp',
            ],
        ];

        foreach ($newsData as $news) {
            News::create($news);
        }
    }
}
