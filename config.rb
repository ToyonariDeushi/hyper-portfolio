# Require any additional compass plugins here.
# コンパスのプラグインを追加する場合はここに記載

# Set this to the root of your project when deployed:
# 各ディレクトリ名の設定
http_path = "/"
css_dir = "css"
sass_dir = "scss"
images_dir = "images"
javascripts_dir = "js"

# You can select your preferred output style here (can be overridden via the command line):
# output_style = :expanded or :nested or :compact or :compressed
# CSSの出力スタイルを設定
output_style = :expanded

# To enable relative paths to assets via compass helper functions. Uncomment:
# CompassではデフォルトのURL指定が絶対パスになっているので、スプライト生成機能を使用する際など、相対パスを使いたい場合はtrueにします。
relative_assets = true

# To disable debugging comments that display the original location of your selectors. Uncomment:
# CSSファイルにlineコメントをつける
# コメントありにすると、CSSファイルを参照したとき、どのSassファイルの何行目の記述か分かるようになります。
line_comments = false

# If you prefer the indented syntax, you might want to regenerate this
# project again passing --syntax sass, or you can uncomment this:
# preferred_syntax = :sass
# and then run:
# sass-convert -R --from scss --to sass sass scss && rm -rf sass && mv scss sass
# SCSSとSASS、二種類のどちらを使うかを設定することが出来ます。
# 一般的にはSCSSが使われているので、デフォルトでもSCSSになっています。
# SASSで書きたいときは以下のようにします。
# preferred_syntax = :sass

# キャッシュファイルを作るか作らないかの設定
cache = false