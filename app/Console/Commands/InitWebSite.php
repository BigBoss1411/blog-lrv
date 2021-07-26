<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \App\Models\User;
use \App\Models\Category;
use \App\Models\Post;

class InitWebSite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 't3h:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Day là command của tôi';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->initUser();
        $this->initCategory();
        $this->initPost();
    }

    private function initUser()
    {
        $this->info('Start Init User');
        User::truncate();
        $user = new User;
        $user->fullname = 'Quản lý';
        $user->role = config('role.moderator');
        $user->email = 'quanly@gmail.com';
        $user->password = bcrypt('123456789');
        $user->save();

        $user = new User;
        $user->fullname = 'admin';
        $user->role = config('role.admin');
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('123456789');
        $user->save();

        $user = new User;
        $user->fullname = 'marketing';
        $user->role = config('role.marketing');
        $user->email = 'marketing@gmail.com';
        $user->password = bcrypt('123456789');
        $user->save();

        $user = new User;
        $user->fullname = 'sale';
        $user->role = config('role.sale');
        $user->email = 'sale@gmail.com';
        $user->password = bcrypt('123456789');
        $user->save();
        $this->info('Finish Init User');
    }

    private function initCategory()
    {
        $this->info('Start Init Category');
        Category::truncate();
        $categories = [
            'Thể thao',
            'Tin tức',
            'Pháp luật',
            'Thị trường',
            'Kinh doanh',
        ];

        foreach ($categories as $category) {
            $categoryModel = new Category;
            $categoryModel->name = $category;
            $categoryModel->save();
        }

        $this->info('Init Category success');

    }

    private function initPost()
    {
        Post::truncate();
        $this->info('Start Post');
        $title = 'Tuyên 3 năm tù với nguyên giám đốc Sở Y tế Long An: Bất thường khi Tòa nhận định bác sĩ Liêm “thành khẩn khai báo”';
        $content = 'Ông Liêm cho biết sẽ kháng cáo kêu oan đến cùng vì “bản án sơ thẩm đã buộc tội oan sai”.
HĐXX nhận định giống như đại diện VKS giữ quyền công tố tại tòa, cho rằng BS Liêm biết rõ thiết bị nhập về không đúng xuất xứ nhưng khi ký phụ lục không thay đổi về giá. Sau đó, BS Liêm cho thanh toán, thanh lý hợp đồng là “gây thất thoát ngân sách nhà nước”.

“Đối với Kết luận giám định (KLGĐ) 4213 ngày 25/9/2020 của Sở Tài chính là do giám định viên khác thực hiện nên không có cơ sở nói không khách quan, vô tư. Do đó KLGĐ 4213 là đúng luật”, bản án nhận định.

HĐXX nhận định trong vụ án, BS Liêm không có tình tiết tăng nặng. Về tình tiết giảm nhẹ, BS Liêm “thành khẩn khai báo, có tác động để nhà thầu nộp lại số tiền 735 triệu đồng; có thời gian công tác trong quân đội và Sở Y tế”, từ đó tuyên BS Liêm 3 năm tù.

Trao đổi với PLVN, LS Nguyễn Văn Quynh nêu: “Lập luận của HĐXX không khác gì của VKS, đã bị BS Liêm và các luật sư phản bác một cách thuyết phục, rõ ràng”.

Một vấn đề khác khiến người dự khán khó hiểu, là vì sao BS Liêm kêu oan nhiều năm nay, chưa từng bao giờ chấp nhận những cáo buộc của CQĐT và VKSND tỉnh Long An, vậy vì sao tòa vẫn nhận định BS Liêm “thành khẩn khai báo”?

Sau phiên tòa, BS Liêm (đang tại ngoại - NV) giải thích: “Như đã nhiều năm nay kêu cứu, tôi khẳng định đây là một vụ án oan sai. Có thể một số cán bộ Tòa án vì biết quá rõ bản chất sự việc, vì thương tôi, nhưng không thể làm trái chỉ đạo của cấp trên nên vẫn buộc phải tuyên vụ án có tội, vừa lồng vào đó tình tiết giảm nhẹ này dù thực sự tôi quyết liệt phản bác tội danh chứ đâu có “thành khẩn khai báo” gì, để tuyên mức án nhẹ nhất trong khung hình phạt”.

BS Liêm khẳng định sẽ kháng cáo bản án theo thủ tục phúc thẩm, tiếp tục tố cáo hành vi sai phạm của một số cán bộ Sở Tài chính khi cố tình giám định sai với vụ việc.

Bùi Yên
Từ khóa: viện kiểm sát kết luận giám định Sở Y tế Long An TAND tỉnh Long An nguyên giám đốc sở y tế';

        $post = new Post;
        $post->title = $title;
        $post->content = $content;
        $post->category_id = rand(1, 5);
        $post->save();

        $this->info('Init Post success');

    }

}
