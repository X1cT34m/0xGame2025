<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* partials/base-root.html.twig */
class __TwigTemplate_2cc251ad698484c724b7179444935e6a184a36271424a191116cbd7bfa90ef84 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascripts' => [$this, 'block_javascripts'],
            'assets' => [$this, 'block_assets'],
            'body' => [$this, 'block_body'],
            'page' => [$this, 'block_page'],
            'navigation' => [$this, 'block_navigation'],
            'titlebar' => [$this, 'block_titlebar'],
            'content_wrapper' => [$this, 'block_content_wrapper'],
            'messages' => [$this, 'block_messages'],
            'widgets' => [$this, 'block_widgets'],
            'content_top' => [$this, 'block_content_top'],
            'content' => [$this, 'block_content'],
            'content_bottom' => [$this, 'block_content_bottom'],
            'footer' => [$this, 'block_footer'],
            'modals' => [$this, 'block_modals'],
            'bottom' => [$this, 'block_bottom'],
        ];
        $this->deferred = $this->env->getExtension('Twig\DeferredExtension\DeferredExtension');
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        if (($this->getAttribute(($context["uri"] ?? null), "extension", [], "method") == "json")) {
            $this->loadTemplate("default.json.twig", "partials/base-root.html.twig", 1)->display($context);
        } else {
            // line 2
            echo "    <!DOCTYPE html>
    <html lang=\"";
            // line 3
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["user"] ?? null), "language", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["user"] ?? null), "language", []), "en")) : ("en")), "html", null, true);
            echo "\">
    <head>
    ";
            // line 5
            $this->displayBlock('head', $context, $blocks);
            // line 30
            echo "
    ";
            // line 31
            $this->displayBlock('assets', $context, $blocks);
            // line 35
            echo "
    <style>
       .simplebar-content-wrapper {
           overflow: auto;
       }
    </style>

    </head>
    ";
            // line 43
            $this->displayBlock('body', $context, $blocks);
            // line 153
            echo "    </html>
";
        }
        $this->deferred->resolve($this, $context, $blocks);
    }

    // line 5
    public function block_head($context, array $blocks = [])
    {
        // line 6
        echo "        <meta charset=\"utf-8\" />
        <title>";
        // line 7
        if (($context["title"] ?? null)) {
            echo strip_tags(($context["title"] ?? null));
            echo " | ";
        } else {
            if ($this->getAttribute(($context["header"] ?? null), "title", [])) {
                echo twig_escape_filter($this->env, $this->getAttribute(($context["header"] ?? null), "title", []), "html", null, true);
                echo " | ";
            }
        }
        echo twig_escape_filter($this->env, $this->getAttribute(($context["site"] ?? null), "title", []), "html", null, true);
        echo "</title>
        ";
        // line 8
        if ($this->getAttribute(($context["header"] ?? null), "description", [])) {
            // line 9
            echo "            <meta name=\"description\" content=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["header"] ?? null), "description", []), "html", null, true);
            echo "\">
        ";
        } else {
            // line 11
            echo "            <meta name=\"description\" content=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["site"] ?? null), "description", []), "html", null, true);
            echo "\">
        ";
        }
        // line 13
        echo "        ";
        if ($this->getAttribute(($context["header"] ?? null), "robots", [])) {
            // line 14
            echo "            <meta name=\"robots\" content=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["header"] ?? null), "robots", []), "html", null, true);
            echo "\">
        ";
        } else {
            // line 16
            echo "            <meta name=\"robots\" content=\"noindex, nofollow\">
        ";
        }
        // line 18
        echo "        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <link rel=\"icon\" type=\"image/png\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, ($context["base_url_simple"] ?? null), "html", null, true);
        echo twig_escape_filter($this->env, ($context["theme_url"] ?? null), "html", null, true);
        echo "/images/favicon.png\">

        ";
        // line 21
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 24
        echo "
        ";
        // line 25
        $this->loadTemplate("partials/javascript-config.html.twig", "partials/base-root.html.twig", 25)->display($context);
        // line 26
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 29
        echo "    ";
    }

    // line 21
    public function block_stylesheets($context, array $blocks = [])
    {
        // line 22
        echo "            ";
        $this->loadTemplate("partials/stylesheets.html.twig", "partials/base-root.html.twig", 22)->display($context);
        // line 23
        echo "        ";
    }

    // line 26
    public function block_javascripts($context, array $blocks = [])
    {
        // line 27
        echo "            ";
        $this->loadTemplate("partials/javascripts.html.twig", "partials/base-root.html.twig", 27)->display($context);
        // line 28
        echo "        ";
    }

    public function block_assets($context, array $blocks = [])
    {
        $this->deferred->defer($this, 'assets');
    }

    // line 31
    public function block_assets_deferred($context, array $blocks = [])
    {
        // line 32
        echo "        ";
        echo $this->getAttribute(($context["assets"] ?? null), "css", [], "method");
        echo "
        ";
        // line 33
        echo $this->getAttribute(($context["assets"] ?? null), "js", [], "method");
        echo "
    ";
        $this->deferred->resolve($this, $context, $blocks);
    }

    // line 43
    public function block_body($context, array $blocks = [])
    {
        // line 44
        echo "        ";
        $context["sidebarStatus"] = $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->getCookie("grav-admin-sidebar");
        // line 45
        echo "        ";
        $context["sidebarStatus"] = (((( !(null === ($context["sidebarStatus"] ?? null)) && (($context["sidebarStatus"] ?? null) == "false")) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "admin", []), "sidebar", []), "size", []) == "small"))) ? ("sidebar-closed") : (""));
        // line 46
        echo "    <body class=\"ga-theme-17x ";
        echo twig_escape_filter($this->env, ($context["sidebarStatus"] ?? null), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "admin", []), "body_classes", []), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, ($context["body_classes"] ?? null), "html", null, true);
        echo "\">

    ";
        // line 48
        if ( !$this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->authorize([0 => "admin.login"])) {
            // line 49
            echo "        ";
            $this->loadTemplate("partials/messages.html.twig", "partials/base-root.html.twig", 49)->display($context);
            // line 50
            echo "    ";
        } else {
            // line 51
            echo "        ";
            $this->displayBlock('page', $context, $blocks);
            // line 145
            echo "
    ";
        }
        // line 147
        echo "
    ";
        // line 148
        $this->displayBlock('bottom', $context, $blocks);
        // line 151
        echo "    </body>
    ";
    }

    // line 51
    public function block_page($context, array $blocks = [])
    {
        // line 52
        echo "        <div class=\"remodal-bg\">

            ";
        // line 54
        $this->displayBlock('navigation', $context, $blocks);
        // line 57
        echo "
            <main id=\"admin-main\" >
                ";
        // line 59
        $this->loadTemplate("partials/nav-toggle.html.twig", "partials/base-root.html.twig", 59)->display($context);
        // line 60
        echo "                <div id=\"titlebar\" class=\"titlebar\">
                    ";
        // line 61
        $this->displayBlock('titlebar', $context, $blocks);
        // line 62
        echo "                </div>

                ";
        // line 64
        $this->displayBlock('content_wrapper', $context, $blocks);
        // line 90
        echo "
                ";
        // line 91
        $this->displayBlock('modals', $context, $blocks);
        // line 140
        echo "
            </main>
            <div id='overlay'></div>
        </div>
        ";
    }

    // line 54
    public function block_navigation($context, array $blocks = [])
    {
        // line 55
        echo "                ";
        $this->loadTemplate("partials/nav.html.twig", "partials/base-root.html.twig", 55)->display($context);
        // line 56
        echo "            ";
    }

    // line 61
    public function block_titlebar($context, array $blocks = [])
    {
    }

    // line 64
    public function block_content_wrapper($context, array $blocks = [])
    {
        // line 65
        echo "                <div data-simplebar class=\"content-wrapper\">
                    <div class=\"";
        // line 66
        if ($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "admin", []), "content_padding", [])) {
            echo "content-padding";
        }
        echo "\">
                        ";
        // line 67
        $this->displayBlock('messages', $context, $blocks);
        // line 70
        echo "
                        ";
        // line 71
        $this->displayBlock('widgets', $context, $blocks);
        // line 72
        echo "                        <div class=\"default-box-shadow\">
                            ";
        // line 73
        $this->displayBlock('content_top', $context, $blocks);
        // line 74
        echo "                            <div class=\"admin-block\">";
        // line 75
        $this->displayBlock('content', $context, $blocks);
        // line 76
        echo "</div>
                            ";
        // line 77
        if ($this->getAttribute($this->getAttribute($this->getAttribute(($context["config"] ?? null), "plugins", []), "admin", []), "show_github_msg", [])) {
            // line 78
            echo "                            <div class=\"notice alert\"><i class=\"fa fa-github\"></i> <a href=\"https://github.com/getgrav/grav-plugin-admin/issues\" target=\"_blank\" rel=\"noopener noreferrer\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.ADMIN_REPORT_ISSUE"), "html", null, true);
            echo "</a></div>
                            ";
        }
        // line 80
        echo "                            ";
        $this->displayBlock('content_bottom', $context, $blocks);
        // line 81
        echo "                        </div>
                        ";
        // line 82
        $this->displayBlock('footer', $context, $blocks);
        // line 87
        echo "                    </div>
                </div>
                ";
    }

    // line 67
    public function block_messages($context, array $blocks = [])
    {
        // line 68
        echo "                            ";
        $this->loadTemplate("partials/messages.html.twig", "partials/base-root.html.twig", 68)->display($context);
        // line 69
        echo "                        ";
    }

    // line 71
    public function block_widgets($context, array $blocks = [])
    {
    }

    // line 73
    public function block_content_top($context, array $blocks = [])
    {
    }

    // line 75
    public function block_content($context, array $blocks = [])
    {
    }

    // line 80
    public function block_content_bottom($context, array $blocks = [])
    {
    }

    // line 82
    public function block_footer($context, array $blocks = [])
    {
        // line 83
        echo "                        <footer id=\"footer\">
                             ";
        // line 84
        $this->loadTemplate("partials/footer.html.twig", "partials/base-root.html.twig", 84)->display($context);
        // line 85
        echo "                        </footer>
                        ";
    }

    // line 91
    public function block_modals($context, array $blocks = [])
    {
        // line 92
        echo "                <div class=\"remodal\" data-remodal-id=\"generic\" data-remodal-options=\"hashTracking: false\">
                    <form>
                        <h1>";
        // line 94
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.ERROR"), "html", null, true);
        echo "</h1>
                        <div class=\"error-content\"></div>
                        <div class=\"button-bar\">
                            <a class=\"button remodal-cancel\" data-remodal-action=\"cancel\" href=\"#\">";
        // line 97
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.CLOSE"), "html", null, true);
        echo "</a>
                        </div>
                    </form>
                </div>
                <div class=\"remodal\" data-remodal-id=\"metadata\" data-remodal-options=\"hashTracking: false\">
                    <form>
                        <h1><span>";
        // line 103
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.METADATA"), "html", null, true);
        echo " for</span> <strong></strong></h1>
                        <div class=\"metadata-preview\">
                            <div class=\"meta-preview\"></div>
                            <div class=\"meta-content\"></div>
                        </div>
                        <div class=\"button-bar\">
                            <a class=\"button remodal-cancel\" data-remodal-action=\"cancel\" href=\"#\">";
        // line 109
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.CLOSE"), "html", null, true);
        echo "</a>
                        </div>
                    </form>
                </div>
                <div class=\"remodal\" data-remodal-id=\"delete-media\" data-remodal-options=\"hashTracking: false\">
                    <form>
                        <h1>";
        // line 115
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.MODAL_DELETE_FILE_CONFIRMATION_REQUIRED_TITLE"), "html", null, true);
        echo "</h1>
                        <p class=\"bigger\">
                            ";
        // line 117
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.MODAL_DELETE_FILE_CONFIRMATION_REQUIRED_DESC"), "html", null, true);
        echo "
                        </p>
                        <br>
                        <div class=\"button-bar\">
                            <button data-remodal-action=\"cancel\" class=\"button secondary remodal-cancel\"><i class=\"fa fa-fw fa-close\"></i> ";
        // line 121
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.CANCEL"), "html", null, true);
        echo "</button>
                            <button data-remodal-action=\"confirm\" class=\"button remodal-confirm disable-after-click\"><i class=\"fa fa-fw fa-check\"></i> ";
        // line 122
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.CONTINUE"), "html", null, true);
        echo "</button>
                        </div>
                    </form>
                </div>
                <div class=\"remodal\" data-remodal-id=\"update-grav\" data-remodal-options=\"hashTracking: false\">
                    <form>
                        <h1>";
        // line 128
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.MODAL_DELETE_FILE_CONFIRMATION_REQUIRED_TITLE"), "html", null, true);
        echo "</h1>
                        <p class=\"bigger\">
                            ";
        // line 130
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.MODAL_UPDATE_GRAV_CONFIRMATION_REQUIRED_DESC"), "html", null, true);
        echo "
                        </p>
                        <br>
                        <div class=\"button-bar\">
                            <button data-remodal-action=\"cancel\" class=\"button secondary remodal-cancel\"><i class=\"fa fa-fw fa-close\"></i> ";
        // line 134
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.CANCEL"), "html", null, true);
        echo "</button>
                            <button data-remodal-action=\"confirm\" class=\"button remodal-confirm disable-after-click\"><i class=\"fa fa-fw fa-check\"></i> ";
        // line 135
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, "PLUGIN_ADMIN.CONTINUE"), "html", null, true);
        echo "</button>
                        </div>
                    </form>
                </div>
                ";
    }

    // line 148
    public function block_bottom($context, array $blocks = [])
    {
        // line 149
        echo "        ";
        echo $this->getAttribute(($context["assets"] ?? null), "js", [0 => "bottom"], "method");
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "partials/base-root.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  482 => 149,  479 => 148,  470 => 135,  466 => 134,  459 => 130,  454 => 128,  445 => 122,  441 => 121,  434 => 117,  429 => 115,  420 => 109,  411 => 103,  402 => 97,  396 => 94,  392 => 92,  389 => 91,  384 => 85,  382 => 84,  379 => 83,  376 => 82,  371 => 80,  366 => 75,  361 => 73,  356 => 71,  352 => 69,  349 => 68,  346 => 67,  340 => 87,  338 => 82,  335 => 81,  332 => 80,  326 => 78,  324 => 77,  321 => 76,  319 => 75,  317 => 74,  315 => 73,  312 => 72,  310 => 71,  307 => 70,  305 => 67,  299 => 66,  296 => 65,  293 => 64,  288 => 61,  284 => 56,  281 => 55,  278 => 54,  270 => 140,  268 => 91,  265 => 90,  263 => 64,  259 => 62,  257 => 61,  254 => 60,  252 => 59,  248 => 57,  246 => 54,  242 => 52,  239 => 51,  234 => 151,  232 => 148,  229 => 147,  225 => 145,  222 => 51,  219 => 50,  216 => 49,  214 => 48,  204 => 46,  201 => 45,  198 => 44,  195 => 43,  188 => 33,  183 => 32,  180 => 31,  171 => 28,  168 => 27,  165 => 26,  161 => 23,  158 => 22,  155 => 21,  151 => 29,  148 => 26,  146 => 25,  143 => 24,  141 => 21,  135 => 19,  132 => 18,  128 => 16,  122 => 14,  119 => 13,  113 => 11,  107 => 9,  105 => 8,  92 => 7,  89 => 6,  86 => 5,  79 => 153,  77 => 43,  67 => 35,  65 => 31,  62 => 30,  60 => 5,  55 => 3,  52 => 2,  48 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% if uri.extension() == 'json' %}{% include 'default.json.twig' %}{% else %}
    <!DOCTYPE html>
    <html lang=\"{{ user.language|default( 'en' ) }}\">
    <head>
    {% block head %}
        <meta charset=\"utf-8\" />
        <title>{% if title %}{{ title|striptags|raw }} | {% else %}{% if header.title %}{{ header.title }} | {% endif %}{% endif %}{{ site.title }}</title>
        {% if header.description %}
            <meta name=\"description\" content=\"{{ header.description }}\">
        {% else %}
            <meta name=\"description\" content=\"{{ site.description }}\">
        {% endif %}
        {% if header.robots %}
            <meta name=\"robots\" content=\"{{ header.robots }}\">
        {% else %}
            <meta name=\"robots\" content=\"noindex, nofollow\">
        {% endif %}
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <link rel=\"icon\" type=\"image/png\" href=\"{{ base_url_simple }}{{ theme_url }}/images/favicon.png\">

        {% block stylesheets %}
            {% include 'partials/stylesheets.html.twig' %}
        {% endblock %}

        {% include 'partials/javascript-config.html.twig' %}
        {% block javascripts %}
            {% include 'partials/javascripts.html.twig' %}
        {% endblock %}
    {% endblock %}

    {% block assets deferred %}
        {{ assets.css()|raw }}
        {{ assets.js()|raw }}
    {% endblock %}

    <style>
       .simplebar-content-wrapper {
           overflow: auto;
       }
    </style>

    </head>
    {% block body %}
        {% set sidebarStatus = get_cookie('grav-admin-sidebar') %}
        {% set sidebarStatus = (sidebarStatus is not null and sidebarStatus == 'false') or config.plugins.admin.sidebar.size == 'small' ? 'sidebar-closed' : '' %}
    <body class=\"ga-theme-17x {{ sidebarStatus }} {{ config.plugins.admin.body_classes }} {{ body_classes }}\">

    {% if not authorize(['admin.login']) %}
        {% include 'partials/messages.html.twig' %}
    {% else %}
        {% block page %}
        <div class=\"remodal-bg\">

            {% block navigation %}
                {% include 'partials/nav.html.twig' %}
            {% endblock %}

            <main id=\"admin-main\" >
                {% include 'partials/nav-toggle.html.twig' %}
                <div id=\"titlebar\" class=\"titlebar\">
                    {% block titlebar %}{% endblock %}
                </div>

                {% block content_wrapper %}
                <div data-simplebar class=\"content-wrapper\">
                    <div class=\"{% if config.plugins.admin.content_padding %}content-padding{% endif %}\">
                        {% block messages %}
                            {% include 'partials/messages.html.twig' %}
                        {% endblock %}

                        {% block widgets %}{% endblock %}
                        <div class=\"default-box-shadow\">
                            {% block content_top %}{% endblock %}
                            <div class=\"admin-block\">
                                {%- block content %}{% endblock -%}
                            </div>
                            {% if config.plugins.admin.show_github_msg %}
                            <div class=\"notice alert\"><i class=\"fa fa-github\"></i> <a href=\"https://github.com/getgrav/grav-plugin-admin/issues\" target=\"_blank\" rel=\"noopener noreferrer\">{{ 'PLUGIN_ADMIN.ADMIN_REPORT_ISSUE'|t }}</a></div>
                            {% endif %}
                            {% block content_bottom %}{% endblock %}
                        </div>
                        {% block footer %}
                        <footer id=\"footer\">
                             {% include 'partials/footer.html.twig' %}
                        </footer>
                        {% endblock %}
                    </div>
                </div>
                {% endblock %}

                {% block modals %}
                <div class=\"remodal\" data-remodal-id=\"generic\" data-remodal-options=\"hashTracking: false\">
                    <form>
                        <h1>{{ \"PLUGIN_ADMIN.ERROR\"|t }}</h1>
                        <div class=\"error-content\"></div>
                        <div class=\"button-bar\">
                            <a class=\"button remodal-cancel\" data-remodal-action=\"cancel\" href=\"#\">{{ \"PLUGIN_ADMIN.CLOSE\"|t }}</a>
                        </div>
                    </form>
                </div>
                <div class=\"remodal\" data-remodal-id=\"metadata\" data-remodal-options=\"hashTracking: false\">
                    <form>
                        <h1><span>{{ \"PLUGIN_ADMIN.METADATA\"|t }} for</span> <strong></strong></h1>
                        <div class=\"metadata-preview\">
                            <div class=\"meta-preview\"></div>
                            <div class=\"meta-content\"></div>
                        </div>
                        <div class=\"button-bar\">
                            <a class=\"button remodal-cancel\" data-remodal-action=\"cancel\" href=\"#\">{{ \"PLUGIN_ADMIN.CLOSE\"|t }}</a>
                        </div>
                    </form>
                </div>
                <div class=\"remodal\" data-remodal-id=\"delete-media\" data-remodal-options=\"hashTracking: false\">
                    <form>
                        <h1>{{ \"PLUGIN_ADMIN.MODAL_DELETE_FILE_CONFIRMATION_REQUIRED_TITLE\"|t }}</h1>
                        <p class=\"bigger\">
                            {{ \"PLUGIN_ADMIN.MODAL_DELETE_FILE_CONFIRMATION_REQUIRED_DESC\"|t }}
                        </p>
                        <br>
                        <div class=\"button-bar\">
                            <button data-remodal-action=\"cancel\" class=\"button secondary remodal-cancel\"><i class=\"fa fa-fw fa-close\"></i> {{ \"PLUGIN_ADMIN.CANCEL\"|t }}</button>
                            <button data-remodal-action=\"confirm\" class=\"button remodal-confirm disable-after-click\"><i class=\"fa fa-fw fa-check\"></i> {{ \"PLUGIN_ADMIN.CONTINUE\"|t }}</button>
                        </div>
                    </form>
                </div>
                <div class=\"remodal\" data-remodal-id=\"update-grav\" data-remodal-options=\"hashTracking: false\">
                    <form>
                        <h1>{{ \"PLUGIN_ADMIN.MODAL_DELETE_FILE_CONFIRMATION_REQUIRED_TITLE\"|t }}</h1>
                        <p class=\"bigger\">
                            {{ \"PLUGIN_ADMIN.MODAL_UPDATE_GRAV_CONFIRMATION_REQUIRED_DESC\"|t }}
                        </p>
                        <br>
                        <div class=\"button-bar\">
                            <button data-remodal-action=\"cancel\" class=\"button secondary remodal-cancel\"><i class=\"fa fa-fw fa-close\"></i> {{ \"PLUGIN_ADMIN.CANCEL\"|t }}</button>
                            <button data-remodal-action=\"confirm\" class=\"button remodal-confirm disable-after-click\"><i class=\"fa fa-fw fa-check\"></i> {{ \"PLUGIN_ADMIN.CONTINUE\"|t }}</button>
                        </div>
                    </form>
                </div>
                {% endblock %}

            </main>
            <div id='overlay'></div>
        </div>
        {% endblock page %}

    {% endif %}

    {% block bottom %}
        {{ assets.js('bottom')|raw }}
    {% endblock %}
    </body>
    {% endblock body %}
    </html>
{% endif %}
", "partials/base-root.html.twig", "/var/www/html/user/plugins/admin/themes/grav/templates/partials/base-root.html.twig");
    }
    private $deferred;
}
