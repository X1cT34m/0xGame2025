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

/* forms/fields/cronstatus/cronstatus.html.twig */
class __TwigTemplate_7907919b681d2a799f10e5ce74c89f9779f5c51c7d9d7e085909cea54a6e80b2 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        $context["jobs"] = $this->getAttribute($this->getAttribute(($context["grav"] ?? null), "scheduler", []), "getAllJobs", [], "method");
        // line 2
        $context["job_states"] = $this->getAttribute($this->getAttribute($this->getAttribute(($context["grav"] ?? null), "scheduler", []), "getJobStates", [], "method"), "content", [], "method");
        // line 3
        echo "
<table class=\"cron-status noflex\">
    <thead>
        <tr>
            <th style=\"flex:3;\">Job ID</th>
            <th style=\"flex:3;\">Run</th>
            <th>Status</th>
            <th class=\"right pad\">State</th>
        </tr>
    </thead>
    <tbody>
    ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["jobs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["job"]) {
            // line 15
            echo "        ";
            $context["job_status"] = $this->getAttribute($this->getAttribute(($context["data"] ?? null), "status", []), $this->getAttribute($context["job"], "id", []));
            // line 16
            echo "        ";
            $context["job_enabled"] = (((array_key_exists("job_status", $context) && (($context["job_status"] ?? null) != "enabled"))) ? (0) : (1));
            // line 17
            echo "        ";
            $context["job_id"] = $this->getAttribute($context["job"], "id", []);
            // line 18
            echo "        ";
            $context["job_id_md5"] = $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->md5Filter(($context["job_id"] ?? null));
            // line 19
            echo "        ";
            $context["job_state"] = $this->getAttribute(($context["job_states"] ?? null), ($context["job_id"] ?? null));
            // line 20
            echo "        ";
            $context["job_at"] = (($this->getAttribute($context["job"], "getAt", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["job"], "getAt", []), "* * * * *")) : ("* * * * *"));
            // line 21
            echo "        ";
            $context["job_backlink"] = $this->getAttribute($context["job"], "backlink", []);
            // line 22
            echo "        <tr>
            <td style=\"flex:3;overflow:hidden;\">
                ";
            // line 24
            if (($context["job_backlink"] ?? null)) {
                // line 25
                echo "                    <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc(($context["job_backlink"] ?? null)), "html", null, true);
                echo "\"><kbd>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["job"], "id", []), "html", null, true);
                echo "</kbd></a>
                ";
            } else {
                // line 27
                echo "                    <kbd>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["job"], "id", []), "html", null, true);
                echo "</kbd>
                ";
            }
            // line 29
            echo "            </td>
            <td style=\"flex:3;\" class=\"cron-at\">
                ";
            // line 31
            if (($context["job_enabled"] ?? null)) {
                // line 32
                echo "                    <span class=\"hint--bottom\" data-hint=\"next run: ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->cronFunc(($context["job_at"] ?? null)), "getNextRunDate", [], "method"), $this->getAttribute($this->getAttribute(($context["config"] ?? null), "date_format", []), "default", [])), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->niceCronFilter(($context["job_at"] ?? null)), "html", null, true);
                echo "</span>
                ";
            } else {
                // line 34
                echo "                    ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->niceCronFilter(($context["job_at"] ?? null)), "html", null, true);
                echo "
                ";
            }
            // line 36
            echo "            </td>
            <td>
                ";
            // line 38
            if (($this->getAttribute(($context["job_state"] ?? null), "state", []) == "failure")) {
                // line 39
                echo "                    ";
                $context["run_type"] = "error";
                // line 40
                echo "                    ";
                $context["run_hint"] = $this->getAttribute(($context["job_state"] ?? null), "error", []);
                // line 41
                echo "                    ";
                $context["run_text"] = "<i class=\"fa fa-warning\"></i> Failure";
                // line 42
                echo "                ";
            } else {
                // line 43
                echo "                    ";
                $context["run_type"] = "info";
                // line 44
                echo "                    ";
                if ( !$this->getAttribute(($context["job_state"] ?? null), "state", [], "any", true, true)) {
                    // line 45
                    echo "                        ";
                    $context["run_hint"] = "not run yet";
                    // line 46
                    echo "                        ";
                    $context["run_text"] = "<i class=\"fa fa-check\"></i> Ready";
                    // line 47
                    echo "                    ";
                } else {
                    // line 48
                    echo "                        ";
                    $context["run_hint"] = ("last run: " . twig_date_format_filter($this->env, $this->getAttribute(($context["job_state"] ?? null), "last-run"), $this->getAttribute($this->getAttribute(($context["config"] ?? null), "date_format", []), "default", [])));
                    // line 49
                    echo "                        ";
                    $context["run_text"] = "<i class=\"fa fa-check\"></i> Success";
                    // line 50
                    echo "                    ";
                }
                // line 51
                echo "                ";
            }
            // line 52
            echo "                <span class=\"hint--bottom\" data-hint=\"";
            echo twig_escape_filter($this->env, ($context["run_hint"] ?? null), "html", null, true);
            echo "\">
                    <span class=\"badge ";
            // line 53
            echo twig_escape_filter($this->env, ($context["run_type"] ?? null), "html", null, true);
            echo "\">";
            echo ($context["run_text"] ?? null);
            echo "</span>
                </span>
            </td>
            <td class=\"right pad\">
                <div class=\"form-data\" data-grav-field=\"toggle\" data-grav-disabled=\"\" data-grav-default=\"null\" data-grav-field-name=\"data[status][";
            // line 57
            echo twig_escape_filter($this->env, ($context["job_id"] ?? null), "html", null, true);
            echo "]\">
                    <div class=\"switch-toggle switch-grav switch-2 \">
                        <input type=\"radio\" value=\"enabled\" id=\"toggle_status.";
            // line 59
            echo twig_escape_filter($this->env, ($context["job_id_md5"] ?? null), "html", null, true);
            echo "1\" name=\"data[status][";
            echo twig_escape_filter($this->env, ($context["job_id"] ?? null), "html", null, true);
            echo "]\" class=\"highlight\" ";
            if (($context["job_enabled"] ?? null)) {
                echo "checked=\"checked\"";
            }
            echo ">
                        <label for=\"toggle_status.";
            // line 60
            echo twig_escape_filter($this->env, ($context["job_id_md5"] ?? null), "html", null, true);
            echo "1\">Enabled</label>

                        <input type=\"radio\" value=\"disabled\" id=\"toggle_status.";
            // line 62
            echo twig_escape_filter($this->env, ($context["job_id_md5"] ?? null), "html", null, true);
            echo "0\" name=\"data[status][";
            echo twig_escape_filter($this->env, ($context["job_id"] ?? null), "html", null, true);
            echo "]\" class=\"\" ";
            if ( !($context["job_enabled"] ?? null)) {
                echo "checked=\"checked\"";
            }
            echo ">
                        <label for=\"toggle_status.";
            // line 63
            echo twig_escape_filter($this->env, ($context["job_id_md5"] ?? null), "html", null, true);
            echo "0\">Disabled</label>
                    </div>
                </div>

            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['job'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo "    </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "forms/fields/cronstatus/cronstatus.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  214 => 70,  201 => 63,  191 => 62,  186 => 60,  176 => 59,  171 => 57,  162 => 53,  157 => 52,  154 => 51,  151 => 50,  148 => 49,  145 => 48,  142 => 47,  139 => 46,  136 => 45,  133 => 44,  130 => 43,  127 => 42,  124 => 41,  121 => 40,  118 => 39,  116 => 38,  112 => 36,  106 => 34,  98 => 32,  96 => 31,  92 => 29,  86 => 27,  78 => 25,  76 => 24,  72 => 22,  69 => 21,  66 => 20,  63 => 19,  60 => 18,  57 => 17,  54 => 16,  51 => 15,  47 => 14,  34 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% set jobs = grav.scheduler.getAllJobs() %}
{% set job_states = grav.scheduler.getJobStates().content() %}

<table class=\"cron-status noflex\">
    <thead>
        <tr>
            <th style=\"flex:3;\">Job ID</th>
            <th style=\"flex:3;\">Run</th>
            <th>Status</th>
            <th class=\"right pad\">State</th>
        </tr>
    </thead>
    <tbody>
    {% for job in jobs %}
        {% set job_status = attribute(data.status,job.id) %}
        {% set job_enabled = job_status is defined and job_status != 'enabled' ? 0 : 1 %}
        {% set job_id = job.id %}
        {% set job_id_md5 = job_id|md5 %}
        {% set job_state = attribute(job_states, job_id) %}
        {% set job_at = job.getAt|default('* * * * *') %}
        {% set job_backlink = job.backlink %}
        <tr>
            <td style=\"flex:3;overflow:hidden;\">
                {% if job_backlink %}
                    <a href=\"{{ admin_route(job_backlink) }}\"><kbd>{{ job.id }}</kbd></a>
                {% else %}
                    <kbd>{{ job.id }}</kbd>
                {% endif %}
            </td>
            <td style=\"flex:3;\" class=\"cron-at\">
                {% if job_enabled %}
                    <span class=\"hint--bottom\" data-hint=\"next run: {{ cron(job_at).getNextRunDate()|date(config.date_format.default) }}\">{{ job_at|nicecron }}</span>
                {% else %}
                    {{ job_at|nicecron }}
                {% endif %}
            </td>
            <td>
                {% if job_state.state == 'failure' %}
                    {% set run_type = 'error' %}
                    {% set run_hint = job_state.error %}
                    {% set run_text = \"<i class=\\\"fa fa-warning\\\"></i> Failure\" %}
                {% else %}
                    {% set run_type = 'info' %}
                    {% if job_state.state is not defined %}
                        {% set run_hint = \"not run yet\" %}
                        {% set run_text = \"<i class=\\\"fa fa-check\\\"></i> Ready\"  %}
                    {% else %}
                        {% set run_hint = \"last run: \" ~ attribute(job_state,'last-run')|date(config.date_format.default) %}
                        {% set run_text = \"<i class=\\\"fa fa-check\\\"></i> Success\" %}
                    {% endif %}
                {% endif %}
                <span class=\"hint--bottom\" data-hint=\"{{ run_hint }}\">
                    <span class=\"badge {{ run_type }}\">{{ run_text|raw }}</span>
                </span>
            </td>
            <td class=\"right pad\">
                <div class=\"form-data\" data-grav-field=\"toggle\" data-grav-disabled=\"\" data-grav-default=\"null\" data-grav-field-name=\"data[status][{{ job_id }}]\">
                    <div class=\"switch-toggle switch-grav switch-2 \">
                        <input type=\"radio\" value=\"enabled\" id=\"toggle_status.{{ job_id_md5 }}1\" name=\"data[status][{{ job_id }}]\" class=\"highlight\" {% if job_enabled %}checked=\"checked\"{% endif %}>
                        <label for=\"toggle_status.{{ job_id_md5 }}1\">Enabled</label>

                        <input type=\"radio\" value=\"disabled\" id=\"toggle_status.{{ job_id_md5 }}0\" name=\"data[status][{{ job_id }}]\" class=\"\" {% if not job_enabled %}checked=\"checked\"{% endif %}>
                        <label for=\"toggle_status.{{ job_id_md5 }}0\">Disabled</label>
                    </div>
                </div>

            </td>
        </tr>
    {% endfor %}
    </tbody>
</table>
", "forms/fields/cronstatus/cronstatus.html.twig", "/var/www/html/user/plugins/admin/themes/grav/templates/forms/fields/cronstatus/cronstatus.html.twig");
    }
}
